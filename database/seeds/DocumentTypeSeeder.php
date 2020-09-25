<?php

use Illuminate\Database\Seeder;
use App\DocumentType;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = new DocumentType;
        $document->document_type = 'DNI';
        $document->save();

        $document = new DocumentType;
        $document->document_type = 'LC';
        $document->save();
        
        $document = new DocumentType;
        $document->document_type = 'LE';
        $document->save();

        $document = new DocumentType;
        $document->document_type = 'CI';
        $document->save();

        $document = new DocumentType;
        $document->document_type = 'Pasaporte';
        $document->save();
    }
}
