namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    public function model(array $row)
    {
        // Skip baris header
        if ($row[0] === 'kode item') return null;

        return new Barang([
            'kode_barang'      => $row[0], // kode item
            'nama_barang'      => $row[1],
            'jenis'            => $row[2],
            'kategori_barang'  => $row[3], // merk
            'qty'              => $row[4], // satuan
            'harga_barang'     => $row[5], // harga pokok
            'grosir_1'         => $row[6], // harga jual
        ]);
    }
}