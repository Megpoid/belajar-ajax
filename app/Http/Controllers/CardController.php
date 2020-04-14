<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Card;

class CardController extends Controller
{
    public function index() {
        return view('card');
    }

    public function getCardList() {
        $cards = Card::select([
            'id', 'name', 'email', 'avatar',
        ]);

        return DataTables::of($cards)
        ->addColumn('action', function ($cards) {
            return '
            <a href="javascript:void(0)" id="edit-card" data-id="'. $cards->id .'" class="btn btn-warning"> Edit </a>
            <a href="javascript:void(0)" id="delete-card" data-id="'. $cards->id .'" class="btn btn-danger"> Delete </a>';
        })
        ->make(true);
    }

    public function store(Request $request) {
        //if validate error, this should throw error 422
        $this->validate($request,[
            'name'   => 'required|max:100',
            'email'  => 'required',
            'avatar' => 'required|max:2018',
        ]);

        if($request->hasFile('avatar')) {
            $imageName = Card::saveImage($request->name, $request->file('avatar'));
        }
        $newCard = Card::Create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $imageName,
        ]);

        return response()->json([
            'message'   => $newCard['name']. ' Telah Ditambahkan',
            'class_name'  => 'alert-success'
        ]);
    }

    public function edit($id) {
        $editCard = Card::where(['id' => $id])->first();

        return response()->json($editCard);
    }

    public function update(Request $request, $id) {
        $updateCard = Card::where(['id' => $id])->first();
        $imageName = $updateCard['avatar'];
        
        if($request->hasFile('avatar')) {
            Card::deleteImage($updateCard['avatar']);
            $imageName = Card::saveImage($request->name, $request->file('avatar'));
        }
        $updateCard->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $imageName,
        ]);

        return response()->json([
            'message' => $updateCard['name'] . ' Telah Diupdate',
            'class_name' => 'alert-success',
        ]);
    }

    public function destroy($id) {
        $deleteCard = Card::where('id', $id)->first();
        Card::deleteImage($deleteCard['avatar']);
        $deleteCard->delete();
        return response()->json([
            'message' => $deleteCard['name']. ' Telah Dihapus dari Database',
            'class_name' => 'alert-success',
        ]);
    }
}
