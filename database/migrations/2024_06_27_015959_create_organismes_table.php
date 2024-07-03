  <?php

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Database\Migrations\Migration;

// return new class extends Migration
// {
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('organismes', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nom');
    //         $table->text('description');
    //         $table->string('logo')->default('')->change()
    //         ;
    //         $table->string('adresse');
    //         $table->string('secteur_activite');
    //         $table->string('ninea');
    //         $table->date('date_creation');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
//     public function down(): void
//     {
//         Schema::dropIfExists('organismes');
//     }
// };



use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organismes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('logo')->default('');
            $table->string('adresse');
            $table->string('secteur_activite');
            $table->string('ninea');
            $table->date('date_creation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organismes');
    }

   
};
