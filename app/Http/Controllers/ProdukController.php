<?php
namespace App\Http\Controllers;
//produkcontroller ini berguna untuk mengatur produk supaya lebih mudah dikelola
use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\DB;
 
class ProdukController extends Controller
{

    public function index(Request $request){
        $toko =[
            'nama_toko' =>'Makmur Jaya Abadi',
            'alamat' => 'Sidoarjo, Jawa Timur',
            'type' => 'Ruko'
        ];

        $search = $request->keyword;

       // Mengirim data toko ke view 'pages.product'
        $produk = produk::when($search,function($query,$search){
            return $query->where('nama_produk','like',"%{$search}%");
            
        })->get();//query untuk mengambil semua data produk yang ada di tb_produk
        
        // Mengambil semua data produk dari model produk dengan Eloquent
        // Mengambil semua data produk dari tabel tb_produk menggunakan model produk
        // $queryBuilder = DB::table('tb_produk')->get();
        return view('pages.produk.show', [
            'data_toko' => $toko,
            'data_produk' => $produk
        ]);
    }
    // Method create digunakan untuk menampilkan halaman tambah produk
    public function create(){
         return view('pages.produk.add');
    }
    
    public function store(Request $request){
        //validasi
        $request->validate([  //validasi input 
            'nama_produk' => 'required|min:8|max:12', //nama produk wajib di isi
            'harga_produk' => 'required',
            'deskripsi' => 'required', 
        ],[ 
            'nama_produk.min'=>'nama produk minimal 8 karakter', //validasi nama produk minimal
            'nama_produk.max'=>'nama produk maksimal 12 karakter', //validasi nama produk maksimal
            'nama_produk.required'=>'nama produk wajib di isi', //validasi nama produk wajib
            'harga_produk.required'=>'harga produk wajib di isi', //validasi harga produk wajib
            'deskripsi.required'=>'deskripsi produk wajib di isi' //validasi deskripsi produk wajib
        ]);

        //untuk menambahkan data ke tb_produk
        //DB::table('tb_produk') ->create([]);
        //query tambah data 
        produk::create([
            'nama_produk' => $request->nama_produk, //Nama Produk
            'harga' => $request->harga_produk, //Harga Produk
            'deskripsi' => $request->deskripsi, //Deskripsi Produk
            'kategori_id' => 1
        ]);
        //setelah data berhasil di tambah, akan mengarahkan ke halaman /product dan memberikan notif berhasil men....
        return redirect('/product')->with('message', 'Berhasil menambahkan data!');
    }

    public function show($id){
        //mengambil data produk berdasarkan id
        //elequent orm
        $data = produk::findOrFail($id); //supaya jika taidak ditemukan akan menampilkan 404

        //query builder
        // DB::table('tb_produk')->where('id_produk', $id)->firstOrFail();

        return view('pages.produk.detail',[
            'produk' => $data
        ]); //untuk menampilkan detail produk
    }
    public function edit($id){
        //mengambil 1 data spesifikasi dadri id yang dikirimkan dari parameter
        $data = produk::findOrFail($id); 

        return view('pages.produk.edit',[
            'data' => $data,
        ]); //untuk menampilkan form edit produk

    }
    public function update($id,Request $request){
         $request->validate([  //validasi input 
            'nama_produk' => 'required|min:8', //nama produk wajib di isi
            'harga_produk' => 'required',
            'deskripsi' => 'required', 
        ],[ 
            'nama_produk.min'=>'nama produk minimal 8 karakter', //validasi nama produk minimal
            'nama_produk.required'=>'nama produk wajib di isi', //validasi nama produk wajib
            'harga_produk.required'=>'harga produk wajib di isi', //validasi harga produk wajib
            'deskripsi.required'=>'deskripsi produk wajib di isi' //validasi deskripsi produk wajib
        ]);

        //query untuk simpan data yang telah kita update
        produk::where('id_produk',$id)->update([
            'nama_produk' => $request->nama_produk, 
            'harga' => $request->harga_produk, 
            'deskripsi_produk' => $request->deskripsi,
        ]);
        return redirect('/product')->with('message','data berhasil di update!'); //setelah data berhasil di update, akan mengarahkan ke halaman /product dan memberikan notif berhasil
    }
    public function destroy($id){
        //query untuk menghapus data produk berdasarkan id
        produk::findOrFail($id)->delete(); //menggunakan findOrFail untuk memastikan produk dengan id tersebut ada, jika tidak ada akan menampilkan 404
        return redirect('/product')->with('message', 'Data berhasil dihapus!'); //setelah data berhasil di hapus, akan mengarahkan ke halaman /product dan memberikan notif berhasil
    }
}