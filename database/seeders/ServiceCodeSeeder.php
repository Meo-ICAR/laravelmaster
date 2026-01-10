<?php

namespace Database\Seeders;

use App\Models\ServiceCode;
use Illuminate\Database\Seeder;

class ServiceCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'area' => 'AMMINISTRAZIONE', 'title' => 'AMMINISTRAZIONE', 'origin' => 'FCRC'],
            ['id' => 2, 'area' => 'AMMINISTRAZIONE', 'title' => 'AIUTO AMMINISTRATORE', 'origin' => 'FCRC'],
            ['id' => 3, 'area' => 'AMMINISTRAZIONE', 'title' => 'CASSIERE', 'origin' => 'FCRC'],
            ['id' => 4, 'area' => 'AMMINISTRAZIONE', 'title' => 'PRODUCTION ACCOUNTANT', 'origin' => 'INTEGRATA'],
            ['id' => 5, 'area' => 'CASTING', 'title' => 'CASTING DIRECTOR', 'origin' => 'FCRC'],
            ['id' => 6, 'area' => 'CASTING', 'title' => 'CASTING DIRECTOR (UIC)', 'origin' => 'FCRC'],
            ['id' => 7, 'area' => 'CASTING', 'title' => 'ASSISTENTE AL CASTING', 'origin' => 'FCRC'],
            ['id' => 8, 'area' => 'CASTING', 'title' => 'CASTING DIRECTOR FIGURAZIONI', 'origin' => 'INTEGRATA (CROWD)'],
            ['id' => 9, 'area' => 'CASTING', 'title' => 'CAPOGRUPPO', 'origin' => 'INTEGRATA (CROWD)'],
            ['id' => 10, 'area' => 'COSTUMI', 'title' => 'COSTUMISTA', 'origin' => 'FCRC'],
            ['id' => 11, 'area' => 'COSTUMI', 'title' => 'AIUTO COSTUMISTA', 'origin' => 'FCRC'],
            ['id' => 12, 'area' => 'COSTUMI', 'title' => 'ASSISTENTE COSTUMISTA', 'origin' => 'FCRC'],
            ['id' => 13, 'area' => 'COSTUMI', 'title' => 'SARTO', 'origin' => 'FCRC'],
            ['id' => 14, 'area' => 'COSTUMI', 'title' => 'KEY COSTUMER / GESTIONE MAGAZZINO', 'origin' => 'INTEGRATA'],
            ['id' => 15, 'area' => 'ELETTRICISTI', 'title' => 'CAPOSQUADRA (GAFFER)', 'origin' => 'FCRC'],
            ['id' => 16, 'area' => 'ELETTRICISTI', 'title' => 'ELETTRICISTA (SPARK)', 'origin' => 'FCRC'],
            ['id' => 17, 'area' => 'ELETTRICISTI', 'title' => 'OPERATORE CONSOLE LUCI', 'origin' => 'INTEGRATA'],
            ['id' => 18, 'area' => 'FOTOGRAFIA', 'title' => 'DIRETTORE DELLA FOTOGRAFIA', 'origin' => 'FCRC'],
            ['id' => 19, 'area' => 'FOTOGRAFIA', 'title' => 'OPERATORE DI RIPRESA (35/16 mm)', 'origin' => 'FCRC'],
            ['id' => 20, 'area' => 'FOTOGRAFIA', 'title' => 'OPERATORE VIDEO', 'origin' => 'FCRC'],
            ['id' => 21, 'area' => 'FOTOGRAFIA', 'title' => 'OPERATORE STEADYCAM', 'origin' => 'FCRC'],
            ['id' => 22, 'area' => 'FOTOGRAFIA', 'title' => 'OPERATORE LUCI', 'origin' => 'FCRC'],
            ['id' => 23, 'area' => 'FOTOGRAFIA', 'title' => 'OPERATORE SUBACQUEO', 'origin' => 'FCRC'],
            ['id' => 24, 'area' => 'FOTOGRAFIA', 'title' => 'ASSISTENTE OPERATORE (FOCUS PULLER)', 'origin' => 'FCRC'],
            ['id' => 25, 'area' => 'FOTOGRAFIA', 'title' => 'VIDEO ASSIST', 'origin' => 'FCRC'],
            ['id' => 26, 'area' => 'FOTOGRAFIA', 'title' => 'FOTOGRAFO DI SCENA', 'origin' => 'FCRC'],
            ['id' => 27, 'area' => 'FOTOGRAFIA', 'title' => 'FOTOGRAFO', 'origin' => 'FCRC'],
            ['id' => 28, 'area' => 'FOTOGRAFIA', 'title' => 'REPORTER', 'origin' => 'FCRC'],
            ['id' => 29, 'area' => 'FOTOGRAFIA', 'title' => 'D.I.T. (DIGITAL IMAGING TECHNICIAN)', 'origin' => 'INTEGRATA'],
            ['id' => 30, 'area' => 'FOTOGRAFIA', 'title' => 'DATA MANAGER', 'origin' => 'INTEGRATA'],
            ['id' => 31, 'area' => 'FOTOGRAFIA', 'title' => 'PILOTA DRONE (APR)', 'origin' => 'INTEGRATA'],
            ['id' => 32, 'area' => 'FOTOGRAFIA', 'title' => 'SECONDO ASSISTENTE OPERATORE (LOADER)', 'origin' => 'INTEGRATA'],
            ['id' => 33, 'area' => 'MACCHINISTI', 'title' => 'CAPOSQUADRA (KEY GRIP)', 'origin' => 'FCRC'],
            ['id' => 34, 'area' => 'MACCHINISTI', 'title' => 'MACCHINISTA', 'origin' => 'FCRC'],
            ['id' => 35, 'area' => 'MACCHINISTI', 'title' => 'MACCHINISTA TEATRO', 'origin' => 'FCRC'],
            ['id' => 36, 'area' => 'MONTAGGIO', 'title' => 'MONTATORE', 'origin' => 'FCRC'],
            ['id' => 37, 'area' => 'MONTAGGIO', 'title' => 'ASSISTENTE AL MONTAGGIO', 'origin' => 'FCRC'],
            ['id' => 38, 'area' => 'MONTAGGIO', 'title' => 'COLORIST', 'origin' => 'INTEGRATA'],
            ['id' => 39, 'area' => 'POST-PRODUZIONE', 'title' => 'GRAFICA E ANIMAZIONE', 'origin' => 'FCRC'],
            ['id' => 40, 'area' => 'POST-PRODUZIONE', 'title' => 'EFFETTI VISIVI E COMPOSITING', 'origin' => 'FCRC'],
            ['id' => 41, 'area' => 'POST-PRODUZIONE', 'title' => 'VFX SUPERVISOR', 'origin' => 'INTEGRATA'],
            ['id' => 42, 'area' => 'POST-PRODUZIONE', 'title' => 'MOTION DESIGNER', 'origin' => 'INTEGRATA'],
            ['id' => 43, 'area' => 'POST-PRODUZIONE AUDIO', 'title' => 'COMPOSITORE', 'origin' => 'FCRC'],
            ['id' => 44, 'area' => 'POST-PRODUZIONE AUDIO', 'title' => 'SOUND DESIGNER', 'origin' => 'INTEGRATA'],
            ['id' => 45, 'area' => 'POST-PRODUZIONE AUDIO', 'title' => 'RUMORISTA (FOLEY ARTIST)', 'origin' => 'INTEGRATA'],
            ['id' => 46, 'area' => 'POST-PRODUZIONE AUDIO', 'title' => 'MONTATORE DEL SUONO', 'origin' => 'INTEGRATA'],
            ['id' => 47, 'area' => 'PRODUZIONE', 'title' => 'PRODUTTORE', 'origin' => 'FCRC'],
            ['id' => 48, 'area' => 'PRODUZIONE', 'title' => 'PRODUTTORE ESECUTIVO', 'origin' => 'FCRC'],
            ['id' => 49, 'area' => 'PRODUZIONE', 'title' => 'ORGANIZZATORE DI PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 50, 'area' => 'PRODUZIONE', 'title' => 'DIRETTORE di PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 51, 'area' => 'PRODUZIONE', 'title' => 'ISPETTORE DI PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 52, 'area' => 'PRODUZIONE', 'title' => 'LOCATION MANAGER', 'origin' => 'FCRC'],
            ['id' => 53, 'area' => 'PRODUZIONE', 'title' => 'LOCATION SCOUT', 'origin' => 'FCRC'],
            ['id' => 54, 'area' => 'PRODUZIONE', 'title' => 'SEGRETARIO DI PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 55, 'area' => 'PRODUZIONE', 'title' => 'COORDINATORE DI PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 56, 'area' => 'PRODUZIONE', 'title' => 'ASSISTENTE DI PRODUZIONE', 'origin' => 'FCRC'],
            ['id' => 57, 'area' => 'PRODUZIONE', 'title' => 'ASSISTENTE AL PRODUTTORE', 'origin' => 'FCRC'],
            ['id' => 58, 'area' => 'PRODUZIONE', 'title' => 'AIUTO SEGRETARIO DI PROD./ RUNNER', 'origin' => 'FCRC'],
            ['id' => 59, 'area' => 'PRODUZIONE', 'title' => 'AUTISTA', 'origin' => 'FCRC'],
            ['id' => 60, 'area' => 'PRODUZIONE', 'title' => 'UNIT MANAGER', 'origin' => 'INTEGRATA'],
            ['id' => 61, 'area' => 'PRODUZIONE', 'title' => 'GREEN MANAGER / ECO-CONSULTANT', 'origin' => 'INTEGRATA'],
            ['id' => 62, 'area' => 'PRODUZIONE', 'title' => 'TRAVEL COORDINATOR', 'origin' => 'INTEGRATA'],
            ['id' => 63, 'area' => 'REGIA', 'title' => 'REGISTA', 'origin' => 'FCRC'],
            ['id' => 64, 'area' => 'REGIA', 'title' => 'FILM-MAKER INDIPENDENTE', 'origin' => 'FCRC'],
            ['id' => 65, 'area' => 'REGIA', 'title' => 'AIUTO REGISTA', 'origin' => 'FCRC'],
            ['id' => 66, 'area' => 'REGIA', 'title' => 'ASSISTENTE ALLA REGIA', 'origin' => 'FCRC'],
            ['id' => 67, 'area' => 'REGIA', 'title' => 'SEGRETARIO DI EDIZIONE (SCRIPT SUPERVISOR)', 'origin' => 'FCRC'],
            ['id' => 68, 'area' => 'REGIA', 'title' => "ACTOR'S COACH", 'origin' => 'FCRC'],
            ['id' => 69, 'area' => 'REGIA', 'title' => 'INTIMACY COORDINATOR', 'origin' => 'INTEGRATA'],
            ['id' => 70, 'area' => 'REGIA', 'title' => 'CROWD MARSHALL (GESTIONE COMPARSE)', 'origin' => 'INTEGRATA'],
            ['id' => 71, 'area' => 'REGIA', 'title' => 'AIUTO REGISTA ALLE FIGURAZIONI', 'origin' => 'INTEGRATA (CROWD)'],
            ['id' => 72, 'area' => 'REGIA', 'title' => 'CHAPERONE (TUTELA MINORI)', 'origin' => 'INTEGRATA'],
            ['id' => 73, 'area' => 'SCENEGGIATURA', 'title' => 'SCENEGGIATORE', 'origin' => 'FCRC'],
            ['id' => 74, 'area' => 'SCENEGGIATURA', 'title' => 'SCRIPT COORDINATOR', 'origin' => 'FCRC'],
            ['id' => 75, 'area' => 'SCENEGGIATURA', 'title' => 'DIALOGHISTA', 'origin' => 'FCRC'],
            ['id' => 76, 'area' => 'SCENEGGIATURA', 'title' => 'STORYBOARD ARTIST', 'origin' => 'INTEGRATA'],
            ['id' => 77, 'area' => 'SCENOGRAFIA', 'title' => 'SCENOGRAFO', 'origin' => 'FCRC'],
            ['id' => 78, 'area' => 'SCENOGRAFIA', 'title' => 'ARREDATORE', 'origin' => 'FCRC'],
            ['id' => 79, 'area' => 'SCENOGRAFIA', 'title' => 'EFFETTI SPECIALI (SFX)', 'origin' => 'FCRC'],
            ['id' => 80, 'area' => 'SCENOGRAFIA', 'title' => 'ASSISTENTE SCENOGRAFO', 'origin' => 'FCRC'],
            ['id' => 81, 'area' => 'SCENOGRAFIA', 'title' => 'AIUTO SCENOGRAFO', 'origin' => 'FCRC'],
            ['id' => 82, 'area' => 'SCENOGRAFIA', 'title' => 'ATTREZZISTA (PROP MASTER)', 'origin' => 'FCRC'],
            ['id' => 83, 'area' => 'SCENOGRAFIA', 'title' => 'AIUTO ATTREZZISTA', 'origin' => 'FCRC'],
            ['id' => 84, 'area' => 'SCENOGRAFIA', 'title' => 'REALIZZAZIONI SCENOGRAFICHE', 'origin' => 'FCRC'],
            ['id' => 85, 'area' => 'SCENOGRAFIA', 'title' => 'MANOVALE', 'origin' => 'FCRC'],
            ['id' => 86, 'area' => 'SCENOGRAFIA', 'title' => 'SET DECORATOR', 'origin' => 'INTEGRATA'],
            ['id' => 87, 'area' => 'SCENOGRAFIA', 'title' => 'BUYER', 'origin' => 'INTEGRATA'],
            ['id' => 88, 'area' => 'SCENOGRAFIA', 'title' => 'CAPO COSTRUTTORE', 'origin' => 'INTEGRATA'],
            ['id' => 89, 'area' => 'SCENOGRAFIA', 'title' => 'PITTORE DI SCENA', 'origin' => 'INTEGRATA'],
            ['id' => 90, 'area' => 'STUNT', 'title' => 'STUNT COORDINATOR', 'origin' => 'FCRC'],
            ['id' => 91, 'area' => 'STUNT', 'title' => 'STUNT', 'origin' => 'FCRC'],
            ['id' => 92, 'area' => 'STUNT', 'title' => 'MAESTRO', 'origin' => 'FCRC'],
        ];

        foreach ($data as $item) {
            ServiceCode::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
