<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    public function users(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('adminHome', ['users'=> User::all()]);
    }


    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        if ($user) {
        $user->delete();

        }
        return redirect()->route('admin.home')
            ->with('success', 'Usuário excluído com sucesso.');

    }

    public function promoteAdmin(Request $request, $id): \Illuminate\Http\RedirectResponse
    {

        $user = User::find($id);


        if ($request->has('promover')) {
            $user->is_admin = true;
        } else {
            $user->is_admin = false;
        }

        $user->save();

        return redirect()->back()->with('success', 'Estado atualizado com sucesso');

    }


    public function updateProfile(Request $request): \Illuminate\Http\RedirectResponse
    {
        if(\auth()->user()){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
    }
        if (!auth()->user()->is_admin) {
            return redirect()->route('perfil.show')->with('success', 'Dados atualizados com sucesso!');
        }
        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');

    }

    public function showProfile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('partials.minhaConta.configConta');
    }

    public function purchaseHistory()
    {
        return $this->hasMany(PurchaseHistory::class);
    }

    public function autoDestroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();

        }
        return redirect()->route('home')
            ->with('success', 'Conta excluída com sucesso.');

    }

}
