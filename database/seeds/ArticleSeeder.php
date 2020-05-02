<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([  
            'titre' => 'Premier article',  
            'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'img' => 'avatar4.jpg',  
            'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'id_user' => '3',   
        ]);
            DB::table('articles')->insert([  
                'titre' => 'Deuxième article',  
                'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
                'img' => 'avatar4.jpg',  
                'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
                'id_user' => '2',  
            ]);  
            DB::table('articles')->insert([   
                'titre' => 'Troisième article',    
                'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
                'img' => 'avatar4.jpg',  
                'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
                'id_user' => '2',  
            ]);
        DB::table('articles')->insert([  
            'titre' => 'Quatrième article',  
            'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'img' => 'avatar4.jpg',  
            'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'id_user' => '3',  
        ]);
        DB::table('articles')->insert([  
            'titre' => 'Cinquième article',  
            'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'img' => 'avatar4.jpg',  
            'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'id_user' => '3',  
        ]);
        DB::table('articles')->insert([  
            'titre' => 'Sixième article',  
            'description' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'img' => 'avatar4.jpg',  
            'contenu' => 'Contenu de ouf avec lorem ipsum glk générateur de texte ahah tmtc tu connaiiiiiiis les bon bailssss',  
            'id_user' => '3',  
        ]);
    }
}
