<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author');
        });

        
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott   Fitzgerald',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
            ],
            [
                'title' => 'The Grapes of Wrath',
                'author' => 'John Steinbeck',
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author' => $book['author'],
            ]);
        }

    }
}
