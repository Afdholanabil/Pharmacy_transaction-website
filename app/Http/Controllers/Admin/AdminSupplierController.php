<?php

namespace App\Http\Controllers\Admin;

use App\Models\Suplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSupplierController extends Controller
{
    public function index() {
        $suppliers = Suplier::paginate(10);
        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create() {
        $latestSupplier = Suplier::orderBy('KdSuplier', 'desc')->first();
        $newKode = 'SUP001'; 

        if ($latestSupplier) {
            $lastNumber = (int) substr($latestSupplier->KdSuplier, 3); 
            $newNumber = $lastNumber + 1;
            $newKode = 'SUP' . str_pad($newNumber, 3, '0', STR_PAD_LEFT); 
        }

        return view('admin.supplier.create', ['newKodeSupplier' => $newKode]);
    }

    public function store(Request $request) {
        $request->validate([
            'NmSuplier' => ['required', 'string', 'max:255'],
            'Alamat' => ['required', 'string'],
            'Kota' => ['required', 'string', 'max:100'],
            'Telpon' => ['required', 'string', 'max:20'],
        ]);

        $latestSupplier = Suplier::orderBy('KdSuplier', 'desc')->first();
        $newKode = 'SUP001';
        if ($latestSupplier) {
            $lastNumber = (int) substr($latestSupplier->KdSuplier, 3);
            $newNumber = $lastNumber + 1;
            $newKode = 'SUP' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        }

        $data = $request->all();
        $data['KdSuplier'] = $newKode;

        Suplier::create($data);
        return redirect()->route('admin.supplier.index')->with('success', 'Supplier baru berhasil ditambahkan.');
    }

    public function edit(Suplier $supplier) {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Suplier $supplier) {
        $request->validate([
            'Alamat' => ['required', 'string'],
            'Kota' => ['required', 'string', 'max:100'],
            'Telpon' => ['required', 'string', 'max:20'],
        ]);
        $supplier->update($request->only(['Alamat', 'Kota', 'Telpon']));
        return redirect()->route('admin.supplier.index')->with('success', 'Data supplier berhasil diperbarui.');
    }

    public function destroy(Suplier $supplier) {
        // Cek relasi sebelum menghapus
        if ($supplier->obats()->exists()) {
            return redirect()->route('admin.supplier.index')
                             ->with('error', 'Gagal menghapus! Supplier ini masih memiliki produk terkait di dalam database.');
        }

        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with('success', 'Data supplier berhasil dihapus.');
    }
}
