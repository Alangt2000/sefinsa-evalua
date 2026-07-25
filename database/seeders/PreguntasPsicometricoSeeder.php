<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Seeder;

class PreguntasPsicometricoSeeder extends Seeder
{
    /**
     * Cargar las preguntas del examen psicométrico.
     */
    public function run(): void
    {
        /*
         * Estas funciones ayudan a evitar repetir demasiado código.
         */
        $guardar = function (array $datos): void {
            Pregunta::updateOrCreate(
                [
                    'examen' => 'psicometrico',
                    'orden' => $datos['orden'],
                ],
                array_merge([
                    'seccion' => null,
                    'categoria' => null,
                    'tipo_pregunta' => 'opcion_multiple',
                    'pregunta' => '',
                    'opcion_a' => null,
                    'opcion_b' => null,
                    'opcion_c' => null,
                    'opcion_d' => null,
                    'opcion_e' => null,
                    'respuesta_correcta' => null,
                    'criterio_evaluacion' => null,
                    'calificacion_automatica' => true,
                    'valor' => 1,
                    'puntaje_maximo' => 1,
                    'activa' => true,
                ], $datos)
            );
        };

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 1: RAZONAMIENTO LÓGICO Y NUMÉRICO
        |--------------------------------------------------------------------------
        */

        $guardar([
            'orden' => 1,
            'seccion' => 'Razonamiento lógico y numérico',
            'categoria' => 'Razonamiento',
            'pregunta' => '¿Qué número sigue? 2 – 4 – 8 – 16 – ___',
            'opcion_a' => '20',
            'opcion_b' => '24',
            'opcion_c' => '30',
            'opcion_d' => '32',
            'respuesta_correcta' => 'd',
        ]);

        $guardar([
            'orden' => 2,
            'seccion' => 'Razonamiento lógico y numérico',
            'categoria' => 'Razonamiento',
            'pregunta' => '¿Qué número sigue? 5 – 10 – 20 – 40 – ___',
            'opcion_a' => '60',
            'opcion_b' => '70',
            'opcion_c' => '80',
            'opcion_d' => '100',
            'respuesta_correcta' => 'c',
        ]);

        $guardar([
            'orden' => 3,
            'seccion' => 'Razonamiento lógico y numérico',
            'categoria' => 'Razonamiento',
            'pregunta' => 'Todos los asesores son empleados. Juan es asesor. Por lo tanto:',
            'opcion_a' => 'Juan es gerente',
            'opcion_b' => 'Juan es empleado',
            'opcion_c' => 'Juan no trabaja',
            'opcion_d' => 'No se puede saber',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 4,
            'seccion' => 'Razonamiento lógico y numérico',
            'categoria' => 'Razonamiento',
            'pregunta' => 'Un asesor revisa 60 solicitudes en 3 horas. ¿Cuántas revisará en 6 horas al mismo ritmo?',
            'opcion_a' => '90',
            'opcion_b' => '100',
            'opcion_c' => '120',
            'opcion_d' => '180',
            'respuesta_correcta' => 'c',
        ]);

        $guardar([
            'orden' => 5,
            'seccion' => 'Razonamiento lógico y numérico',
            'categoria' => 'Razonamiento',
            'pregunta' => 'Un cliente debe $20,000 y paga el 25% de su deuda. ¿Cuánto pagó?',
            'opcion_a' => '$4,000',
            'opcion_b' => '$5,000',
            'opcion_c' => '$6,000',
            'opcion_d' => '$7,500',
            'respuesta_correcta' => 'b',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 2: ATENCIÓN Y CONCENTRACIÓN
        |--------------------------------------------------------------------------
        */

        $guardar([
            'orden' => 6,
            'seccion' => 'Atención y concentración',
            'categoria' => 'Atención',
            'pregunta' => 'Selecciona la palabra escrita correctamente:',
            'opcion_a' => 'Financiera',
            'opcion_b' => 'Finaciera',
            'opcion_c' => 'Financera',
            'opcion_d' => 'Financieera',
            'respuesta_correcta' => 'a',
        ]);

        $guardar([
            'orden' => 7,
            'seccion' => 'Atención y concentración',
            'categoria' => 'Atención',
            'pregunta' => 'Selecciona la palabra escrita correctamente:',
            'opcion_a' => 'Responsable',
            'opcion_b' => 'Responsavle',
            'opcion_c' => 'Responsabele',
            'opcion_d' => 'Responsabble',
            'respuesta_correcta' => 'a',
        ]);

        $guardar([
            'orden' => 8,
            'seccion' => 'Atención y concentración',
            'categoria' => 'Atención',
            'tipo_pregunta' => 'respuesta_corta',
            'pregunta' => '¿Cuántas letras “A” aparecen en la siguiente frase? CASA AMARILLA ADMINISTRACIÓN',
            'respuesta_correcta' => '10',
            'criterio_evaluacion' => 'Comparar la respuesta numérica con 10.',
        ]);

        $guardar([
            'orden' => 9,
            'seccion' => 'Atención y concentración',
            'categoria' => 'Atención',
            'tipo_pregunta' => 'respuesta_corta',
            'pregunta' => 'Encuentra el número diferente: 45897 / 45897 / 45879 / 45897 / 45897',
            'respuesta_correcta' => '45879',
            'criterio_evaluacion' => 'Comparar el número escrito con 45879.',
        ]);

        $guardar([
            'orden' => 10,
            'seccion' => 'Atención y concentración',
            'categoria' => 'Atención',
            'tipo_pregunta' => 'respuesta_corta',
            'pregunta' => '¿Qué palabra aparece dos veces? Cliente / Préstamo / Contrato / Cliente / Cobranza',
            'respuesta_correcta' => 'cliente',
            'criterio_evaluacion' => 'Comparar el texto sin distinguir mayúsculas o minúsculas.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 3: RESOLUCIÓN DE PROBLEMAS Y SERVICIO AL CLIENTE
        |--------------------------------------------------------------------------
        */

        $guardar([
            'orden' => 11,
            'seccion' => 'Resolución de problemas y servicio al cliente',
            'categoria' => 'Servicio al cliente',
            'pregunta' => 'Un cliente llega muy molesto porque su solicitud de crédito fue rechazada. ¿Qué haces primero?',
            'opcion_a' => 'Discutir con él',
            'opcion_b' => 'Ignorarlo',
            'opcion_c' => 'Escucharlo, revisar la situación y explicarle las opciones disponibles',
            'opcion_d' => 'Pedirle que se retire',
            'respuesta_correcta' => 'c',
        ]);

        $guardar([
            'orden' => 12,
            'seccion' => 'Resolución de problemas y servicio al cliente',
            'categoria' => 'Servicio al cliente',
            'pregunta' => 'Un cliente no entiende las condiciones de su crédito. ¿Qué haces?',
            'opcion_a' => 'Le dices que lea el contrato',
            'opcion_b' => 'Le explicas con claridad y verificas que haya entendido',
            'opcion_c' => 'Lo apresuras',
            'opcion_d' => 'Ignoras sus dudas',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 13,
            'seccion' => 'Resolución de problemas y servicio al cliente',
            'categoria' => 'Servicio al cliente',
            'pregunta' => 'Un compañero comete un error que afecta a un cliente. ¿Qué haces?',
            'opcion_a' => 'Lo ocultas',
            'opcion_b' => 'Lo corriges y reportas la situación al responsable',
            'opcion_c' => 'Culpas al compañero frente al cliente',
            'opcion_d' => 'No haces nada',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 14,
            'seccion' => 'Resolución de problemas y servicio al cliente',
            'categoria' => 'Servicio al cliente',
            'pregunta' => 'Tienes varias tareas urgentes y un cliente necesita atención. ¿Qué haces?',
            'opcion_a' => 'Ignoras al cliente',
            'opcion_b' => 'Te organizas por prioridad y comunicas los tiempos',
            'opcion_c' => 'Abandonas todo',
            'opcion_d' => 'Le dices que vuelva otro día',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 15,
            'seccion' => 'Resolución de problemas y servicio al cliente',
            'categoria' => 'Servicio al cliente',
            'pregunta' => 'Un cliente ofrece dinero para acelerar su trámite. ¿Qué haces?',
            'opcion_a' => 'Lo aceptas',
            'opcion_b' => 'Lo rechazas y sigues el procedimiento establecido',
            'opcion_c' => 'Lo piensas',
            'opcion_d' => 'Depende del monto',
            'respuesta_correcta' => 'b',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 4: PERSONALIDAD Y CONDUCTA LABORAL
        |--------------------------------------------------------------------------
        |
        | Estas afirmaciones no tienen respuesta correcta.
        | Se guardan con escala del 1 al 5 para que RH pueda revisarlas.
        |
        */

        $afirmacionesPersonalidad = [
            'Cumplo mis compromisos',
            'Llego puntual a mis actividades',
            'Me adapto fácilmente a los cambios',
            'Trabajo bien bajo presión',
            'Me gusta aprender cosas nuevas',
            'Mantengo la calma ante clientes difíciles',
            'Acepto críticas constructivas',
            'Trabajo bien en equipo',
            'Soy una persona organizada',
            'Me considero una persona honesta',
            'Termino las tareas que comienzo',
            'Me esfuerzo por alcanzar mis objetivos',
            'Me siento cómodo trabajando con metas',
            'Soy constante aunque los resultados tarden',
            'Me gusta tratar con diferentes tipos de personas',
        ];

        foreach ($afirmacionesPersonalidad as $indice => $afirmacion) {
            $guardar([
                'orden' => 16 + $indice,
                'seccion' => 'Personalidad y conducta laboral',
                'categoria' => 'Personalidad',
                'tipo_pregunta' => 'escala',
                'pregunta' => $afirmacion,
                'opcion_a' => '1 - Nunca',
                'opcion_b' => '2 - Rara vez',
                'opcion_c' => '3 - Algunas veces',
                'opcion_d' => '4 - Casi siempre',
                'opcion_e' => '5 - Siempre',
                'respuesta_correcta' => null,
                'criterio_evaluacion' => 'Respuesta informativa para revisión de RH.',
                'calificacion_automatica' => false,
                'valor' => 0,
                'puntaje_maximo' => 0,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 5: ÉTICA, CONFIDENCIALIDAD Y RESPONSABILIDAD
        |--------------------------------------------------------------------------
        |
        | Debido a las 15 afirmaciones anteriores, estas preguntas comienzan
        | con el orden interno 31, aunque en el documento son la 16 a la 20.
        |
        */

        $guardar([
            'orden' => 31,
            'seccion' => 'Ética, confidencialidad y responsabilidad',
            'categoria' => 'Ética',
            'pregunta' => 'Encuentras dinero en la oficina. ¿Qué haces?',
            'opcion_a' => 'Lo guardas',
            'opcion_b' => 'Lo reportas inmediatamente',
            'opcion_c' => 'Esperas a ver si alguien lo reclama',
            'opcion_d' => 'Lo compartes',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 32,
            'seccion' => 'Ética, confidencialidad y responsabilidad',
            'categoria' => 'Ética',
            'pregunta' => 'Si nadie nota un error tuyo en un reporte:',
            'opcion_a' => 'Lo ocultas',
            'opcion_b' => 'Lo corriges y lo informas',
            'opcion_c' => 'Esperas',
            'opcion_d' => 'Culpas a otra persona',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 33,
            'seccion' => 'Ética, confidencialidad y responsabilidad',
            'categoria' => 'Ética',
            'pregunta' => 'Un amigo te pide información confidencial de un cliente:',
            'opcion_a' => 'Se la das',
            'opcion_b' => 'Le das una parte',
            'opcion_c' => 'Le explicas que no puedes compartirla',
            'opcion_d' => 'Depende de quién sea',
            'respuesta_correcta' => 'c',
        ]);

        $guardar([
            'orden' => 34,
            'seccion' => 'Ética, confidencialidad y responsabilidad',
            'categoria' => 'Ética',
            'pregunta' => 'Un cliente te pide modificar información para obtener un crédito mayor:',
            'opcion_a' => 'Lo haces',
            'opcion_b' => 'Lo haces si no afecta a nadie',
            'opcion_c' => 'Rechazas la solicitud y sigues el procedimiento',
            'opcion_d' => 'Lo consultas con un compañero',
            'respuesta_correcta' => 'c',
        ]);

        $guardar([
            'orden' => 35,
            'seccion' => 'Ética, confidencialidad y responsabilidad',
            'categoria' => 'Ética',
            'pregunta' => '¿Qué es más importante en una financiera?',
            'opcion_a' => 'Colocar créditos a cualquier costo',
            'opcion_b' => 'Cumplir metas con ética y responsabilidad',
            'opcion_c' => 'Evitar clientes difíciles',
            'opcion_d' => 'Trabajar lo menos posible',
            'respuesta_correcta' => 'b',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 6: INTELIGENCIA EMOCIONAL Y MANEJO DE PRESIÓN
        |--------------------------------------------------------------------------
        */

        $guardar([
            'orden' => 36,
            'seccion' => 'Inteligencia emocional y manejo de presión',
            'categoria' => 'Inteligencia emocional',
            'pregunta' => 'Un compañero te critica frente a otras personas. ¿Qué haces?',
            'opcion_a' => 'Respondes agresivamente',
            'opcion_b' => 'Mantienes la calma y hablas después',
            'opcion_c' => 'Lo insultas',
            'opcion_d' => 'Dejas de trabajar',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 37,
            'seccion' => 'Inteligencia emocional y manejo de presión',
            'categoria' => 'Inteligencia emocional',
            'pregunta' => 'Cuando algo sale mal normalmente:',
            'opcion_a' => 'Culpo a otros',
            'opcion_b' => 'Analizo qué puedo mejorar',
            'opcion_c' => 'Me enojo y abandono',
            'opcion_d' => 'Ignoro el problema',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 38,
            'seccion' => 'Inteligencia emocional y manejo de presión',
            'categoria' => 'Inteligencia emocional',
            'pregunta' => 'Cuando no entiendes una instrucción:',
            'opcion_a' => 'Improvisas',
            'opcion_b' => 'Pides una aclaración',
            'opcion_c' => 'No haces nada',
            'opcion_d' => 'Culpas a quien explicó',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 39,
            'seccion' => 'Inteligencia emocional y manejo de presión',
            'categoria' => 'Inteligencia emocional',
            'pregunta' => 'Cuando tienes muchas tareas pendientes:',
            'opcion_a' => 'Hago la primera que veo',
            'opcion_b' => 'Me organizo por prioridad y urgencia',
            'opcion_c' => 'Me bloqueo',
            'opcion_d' => 'Espero a que me recuerden',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 40,
            'seccion' => 'Inteligencia emocional y manejo de presión',
            'categoria' => 'Inteligencia emocional',
            'pregunta' => 'Un cliente te habla de forma agresiva. ¿Qué haces?',
            'opcion_a' => 'Respondes igual',
            'opcion_b' => 'Mantienes la calma y buscas resolver la situación',
            'opcion_c' => 'Terminas la conversación',
            'opcion_d' => 'Lo ignoras',
            'respuesta_correcta' => 'b',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 7: COMPETENCIAS COMERCIALES Y COBRANZA
        |--------------------------------------------------------------------------
        */

        $guardar([
            'orden' => 41,
            'seccion' => 'Competencias comerciales y cobranza',
            'categoria' => 'Competencias comerciales',
            'pregunta' => 'Un prospecto dice que no está interesado en un crédito. ¿Qué haces?',
            'opcion_a' => 'Insistes agresivamente',
            'opcion_b' => 'Preguntas sobre sus necesidades y explicas solo lo que puede serle útil',
            'opcion_c' => 'Terminas inmediatamente',
            'opcion_d' => 'Lo presionas',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 42,
            'seccion' => 'Competencias comerciales y cobranza',
            'categoria' => 'Competencias comerciales',
            'pregunta' => 'Un cliente se atrasa en su pago. ¿Cuál es el mejor enfoque inicial?',
            'opcion_a' => 'Amenazarlo',
            'opcion_b' => 'Contactarlo con respeto, conocer la causa y buscar una solución conforme a las políticas',
            'opcion_c' => 'Ignorarlo',
            'opcion_d' => 'Exhibirlo',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 43,
            'seccion' => 'Competencias comerciales y cobranza',
            'categoria' => 'Competencias comerciales',
            'pregunta' => 'No alcanzaste tu meta mensual. ¿Qué haces?',
            'opcion_a' => 'Culpar al mercado',
            'opcion_b' => 'Analizar resultados, identificar áreas de mejora y establecer acciones',
            'opcion_c' => 'Ocultar el resultado',
            'opcion_d' => 'Abandonar',
            'respuesta_correcta' => 'b',
        ]);

        $guardar([
            'orden' => 44,
            'seccion' => 'Competencias comerciales y cobranza',
            'categoria' => 'Competencias comerciales',
            'pregunta' => '¿Qué es más importante para una buena venta financiera?',
            'opcion_a' => 'Presionar al cliente',
            'opcion_b' => 'Entender sus necesidades y ofrecer una solución adecuada',
            'opcion_c' => 'Prometer cualquier cosa',
            'opcion_d' => 'Hablar sin escuchar',
            'respuesta_correcta' => 'b',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SECCIÓN 8: PREGUNTAS ABIERTAS
        |--------------------------------------------------------------------------
        */

        $preguntasAbiertas = [
            '¿Por qué te interesa trabajar en una financiera?',
            '¿Por qué consideras que deberíamos contratarte?',
            'Describe una situación en la que hayas trabajado bajo presión.',
            'Describe un problema difícil que hayas resuelto.',
            '¿Cuál es tu principal fortaleza laboral?',
            '¿Cuál es un área en la que te gustaría mejorar?',
        ];

        foreach ($preguntasAbiertas as $indice => $preguntaAbierta) {
            $guardar([
                'orden' => 45 + $indice,
                'seccion' => 'Preguntas abiertas',
                'categoria' => 'Respuesta abierta',
                'tipo_pregunta' => 'abierta',
                'pregunta' => $preguntaAbierta,
                'respuesta_correcta' => null,
                'criterio_evaluacion' => 'Respuesta para revisión manual de Recursos Humanos.',
                'calificacion_automatica' => false,
                'valor' => 0,
                'puntaje_maximo' => 0,
            ]);
        }
    }
}
