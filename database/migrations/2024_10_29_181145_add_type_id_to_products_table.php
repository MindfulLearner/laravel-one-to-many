<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // TODO: do foreign key for type of product, a product can have only one type but a type can have many products
            // $table->unsignedBigInteger('type_id');

            // $table->foreign('type_id')->references('id')->on('types');
         
            $table->foreignId('type_id')->nullable()->constrained();

            // si puo anche usare il seguente comando per creare la foreign key
            // $table->foreignId('type_id')->constrained()->onDelete('cascade'); eventualmente , costrained significa che la colonna type_id e una foreign key che si riferisce alla tabella types e se viene cancellata la tabella types vengono cancellati anche i prodotti associati mentre cascade significa che se viene cancellato il tipo di prodotto vengono cancellati anche i prodotti associati


            // si puo usare 
            // $table->
            // foreignId('type_id')->
            // after('published')->
            // constrained();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // per eliminare la tabella perche rollback non elimina le foreign key si fa cosi  si puo fare dal terminale con php artisan migrate:rollback
            // oppure products_type_id_foreignanziche [type_id]


            // prima rimuove il vincolo di foreign key poi la colonna
            $table->dropForeign(['type_id']);
            // e poi esegue il drop della colonna
            $table->dropColumn('type_id');
        });
    }
};
