<?php

namespace App\Http\Controllers;

use App\Http\Resources\TatekanResource;
use App\Models\Tatekan;
use Google\Cloud\Storage\StorageObject;
use Storage;
use Illuminate\Http\Request;
use Google\Cloud\Storage\StorageClient;

class TatekansController extends Controller
{
    /** @var StorageClient|null */
    private $storage = null;
    /** @var string */
    private $bucketName = 'kc3-winter-team11';

    public function __construct()
    {
        $this->storage = new StorageClient([
            'projectId' => 'kc3-winter-team11',
            'keyFile' => json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/../credentials/private.json'), true)
        ]);
    }

    /**
     * トップページを表示します。
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $tatekans = Tatekan::orderByDesc('id')->limit(10)->get();
        return view('home', compact('tatekans'));
    }

    /**
     * アップロードされたファイルをCloud Storageに保存し、そのURIをCloud SQLに保存します。
     *
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:png',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=100,min_height=100,max_width=500,max_height=500',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/tatekans');
            $bucket = $this->storage->bucket($this->bucketName);
            $object = $bucket->upload(
                fopen($_SERVER['DOCUMENT_ROOT'] . Storage::url($filename), 'r')
            );
            $tatekan = new Tatekan();
            $tatekan->uri = $object->info()['mediaLink'];
            $tatekan->save();

            return redirect('/')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }

    /**
     * ランダムで10件のタテカンを取得します。
     *
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        return TatekanResource::collection(
            Tatekan::inRandomOrder()->limit(15)->get()
        );
    }
}
