<?php
    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class UserController extends Controller
    {
        //Wybranie jednego użytkownika
        public function find($id)
        {
            $user = User::findOrFail($id);
            return response()->json($user);
        }

        //Zmiana danych
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);

            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->lastname = $request->input('lastname');

            $user->save();
            return response()->json($user);
        }

        //Usuwanie użytkownika
        public function destroy($id)
        {
            $user = User::destroy($id);
            return response()->json($user);
        }

        //Pobieranie listy użytkowników
        public function index()
        {
            $user = User::all();
            return response()->json($user);
        }
    }
?>