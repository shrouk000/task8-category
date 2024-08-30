<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categery;
class CategeryController extends Controller
{
    public function index()
    {
        $cata=DB::table ('categery')->get();
        return view ('admin.categories',compact ('cata'));
    }
    public function create()
    { 
    return view('admin.addCategory');
    }
    public function store(Request $request)
    { 
        $cata=new Categery();
        $cata->name=$request->name;
        $cata->save();
        return redirect('/admin/categories');
    }

 public function edit(string $id)
    {
        $cata = Categery::find($id);
        return view(" admin.editCategory", compact('cata'));
    }
    public function update(Request $request, string $id)
    {
        $cata = Categery::find($id);
        $cata->name = $request->name;
        $cata->save();
        return view("admin.Categories", compact('cata'));
    }

  public function destroy(string $id)
    {       // $Categery = Categery::find($id)->forceDelete();

        $cata = Categery::find($id)->delete();
        //return view('Categerys/Categery', compact('Categery'))
        return redirect('/admin/categories');
        ;
    }
}
