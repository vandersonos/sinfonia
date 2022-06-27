<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MediasController extends Controller
{
    
    private $numRowsPage = 1;
    private $generos = array(
        "Axé",
        "Blues",
        "Country",
        "Eletrônica",
        "Forró",
        "Funk",
        "Gospel",
        "Hip Hop",
        "Jazz",
        "MPB",
        "Música clássica",
        "Pagode",
        "Pop",
        "Rap",
        "Reggae",
        "Rock",
        "Samba",
        "Sertanejo"    
    );
    public function index(Request $request)
    {
        $title = $request->title;
        $singer = $request->singer;
        $type = $request->type;
        $release_date = $request->release_date;
        $filtros = [];
        if(!empty($title)){
            $filtros[] = ['title', 'like', '%'.$title.'%'];
        }
        if(!empty($singer)){
            $filtros[] = ['singer', 'like', '%'.$singer.'%'];
        }
        if(!empty($type)){
            $filtros[] = ['type', '=', $type];
        }
        if(!empty($release_date)){
            $filtros[] = ['release_date', '=', $release_date];
        }

        if(!empty($filtros)){
            $medias = DB::table('media')->where($filtros)->paginate($this->numRowsPage);

        }else{
            
            $medias = Media::paginate($this->numRowsPage);
        }

        $mensagem = $request->session()->get(key: 'mensagem');
        $generos = $this->generos;


        return view('Medias/index', compact('medias', 'mensagem', 'title', 'type', 'release_date', 'generos', 'singer'));
    }
    public function show($id)
    {
        $media = Media::find($id);
        $media->loadCount('favorites');
        return view('Medias/show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::find($id);
        $generos = $this->generos;
        return view('Medias/edit', compact('media', 'generos'));
    }

    public function create(Request $request)
    {
        $generos = $this->generos;
        return view('Medias/create', compact('generos'));
    }

    public function store(StoreMediaRequest $request)
    {
        $data = Media::where('title', '=', $request->singer)->get();
        if ($data->isNotEmpty()) {
            return back()->withInput()->withErrors(['mensagem' => "Já existe uma música com o título informado!"]);
        }
        $dt = Carbon::createFromFormat('d/m/Y', $request->release_date);

        $m= new Media();
        $m->title = $request->title;
        $m->singer = $request->singer;
        $m->release_date = $dt->toDateTimeLocalString();
        $m->inserted_date = Carbon::now();
        $m->type = $request->type;
        $m->save();
        $request->session()->put('mensagem', "Mídia {$m->title} foi cadastrada com sucesso.");

        return redirect("/medias/");
    }



    public function update(StoreMediaRequest $request, $id)
    {
        $data = Media::where('title', '=', $request->singer)->where('id', '<>', $id)->get();
        if ($data->isNotEmpty()) {
            return back()->withInput()->withErrors(['mensagem' => "Já existe uma música com o título informado!"]);
        }
        $dt = Carbon::createFromFormat('d/m/Y', $request->release_date);
        $m = Media::find($id);
        $m->title = $request->title;
        $m->singer = $request->singer;
        $m->release_date = $dt->toDateTimeLocalString();
        $m->type = $request->type;
        $m->save();

        $request->session()->put('mensagem', "Mídia {$m->title} foi atualizada com sucesso.");

        return redirect("/medias/");
    }

    public function previewRemove($id)
    {
        $media = Media::find($id);
        $media->loadCount('favorites');
        return view('Medias/remove', compact('media'));
    }

    public function destroy(Request $request, $id)
    {
        $m = Media::find($id);
        $m->delete();
        $request->session()->put('mensagem', "Mídia removido com sucesso.");
        return redirect("/medias/");
    }
    
}
