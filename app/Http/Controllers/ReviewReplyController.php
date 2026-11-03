<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewReplyController extends Controller
{
    public function index()
    {
        $reviews = DB::table('reviews')
            ->leftJoin(
                'products',
                'reviews.product_id',
                '=',
                'products.product_id'
            )
            ->leftJoin(
                'review_replies',
                'reviews.review_id',
                '=',
                'review_replies.review_id'
            )
            ->select(
                'reviews.*',
                'products.product_name',
                'review_replies.reply_id',
                'review_replies.responder_name',
                'review_replies.reply'
            )
            ->orderByDesc('reviews.created_at')
            ->get();

        return view('admin.review_replies.index', compact('reviews'));
    }

    public function store(Request $request, string $reviewId)
    {
        $request->validate([
            'responder_name' => 'required|string|max:255',
            'reply' => 'required|string',
        ]);

        $review = DB::table('reviews')
            ->where('review_id', $reviewId)
            ->first();

        abort_if(!$review, 404);

        $existingReply = DB::table('review_replies')
            ->where('review_id', $reviewId)
            ->exists();

        if ($existingReply) {
            return redirect()->route('review-replies.index')
                ->with('error', 'Ulasan ini sudah memiliki balasan.');
        }

        DB::table('review_replies')->insert([
            'review_id' => $reviewId,
            'responder_name' => $request->responder_name,
            'reply' => $request->reply,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('review-replies.index')
            ->with('success', 'Balasan berhasil ditambahkan!');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'responder_name' => 'required|string|max:255',
            'reply' => 'required|string',
        ]);

        $exists = DB::table('review_replies')
            ->where('reply_id', $id)
            ->exists();

        abort_if(!$exists, 404);

        DB::table('review_replies')
            ->where('reply_id', $id)
            ->update([
                'responder_name' => $request->responder_name,
                'reply' => $request->reply,
                'updated_at' => now(),
            ]);

        return redirect()->route('review-replies.index')
            ->with('success', 'Balasan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $exists = DB::table('review_replies')
            ->where('reply_id', $id)
            ->exists();

        abort_if(!$exists, 404);

        DB::table('review_replies')
            ->where('reply_id', $id)
            ->delete();

        return redirect()->route('review-replies.index')
            ->with('success', 'Balasan berhasil dihapus!');
    }
}
