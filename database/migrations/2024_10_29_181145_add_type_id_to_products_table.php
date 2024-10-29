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
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');


            // si puo anche usare il seguente comando per creare la foreign key
            // $table->foreignId('type_id')->constrained()->onDelete('cascade'); eventualmente , costrained significa che la colonna type_id e una foreign key che si riferisce alla tabella types e se viene cancellata la tabella types vengono cancellati anche i prodotti associati mentre cascade significa che se viene cancellato il tipo di prodotto vengono cancellati anche i prodotti associati

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // per eliminare la tabella perche rollback non elimina le foreign key si fa cosi  si puo fare dal terminale con php artisan migrate:rollback
            Schema::dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
    }
};
