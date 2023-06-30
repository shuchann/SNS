// <?php

// namespace App\Http\Controllers;

// use App\Models\Comment;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CommentsController extends Controller
// {
//     public function store(Request $request)
//     {
//         $comment = new Comment();
//         $comment->comment = $request->comment;
//         $comment->post_id = $request->post_id;
//         $comment->user_id = Auth::user()->id;
//         $comment->save();

//         return redirect()->back();
//     }

//     public function destroy(Request $request, Comment $comment)
//     {
//         $comment->delete();
//         return redirect()->back();
//     }
// }