<?php

namespace App\Http\Controllers\Admin\PropertyManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use File;

class PDFExportController extends Controller
{
    public function pdfExport(Request $request){

        return view('admin.pdf_export.pdf_export_create');
    }

    public function storePdfExport(Request $request){

        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:20480'
        ]);

        $file = $request->file('pdf_file');
        $filename = time() . '_' . $file->getClientOriginalName();

        $destinationPath = public_path('upload/PDFExport/');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        // Extract text using Spatie
        $fullPath = public_path("upload/PDFExport/{$filename}");
        $text = (new Pdf('E:\\laragon\\bin\\git\\mingw64\\bin\\pdftotext.exe'))
        ->setPdf($fullPath)
        ->text();


        return back()->with('pdf_text', $text);

    }
}
