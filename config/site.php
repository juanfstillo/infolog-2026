<?php

return [

    'nav' => [
        ['label' => 'Inicio', 'route' => 'home'],
        ['label' => 'La Empresa', 'route' => 'la-empresa'],
        ['label' => 'Servicios', 'route' => 'servicios.index'],
        ['label' => 'Nuestro Cliente', 'route' => 'nuestro-cliente'],
        ['label' => 'Prensa', 'route' => 'prensa'],
    ],

    'footer_links' => [
        ['label' => 'Conocenos', 'route' => 'conocenos'],
        ['label' => 'Política de Calidad', 'route' => 'politica-calidad'],
        ['label' => 'Contacto', 'route' => 'contacto'],
    ],

    'contact' => [
        'address_short' => 'Coronel García 629, Avellaneda',
        'address_full' => 'Coronel García 629, Avellaneda, Provincia de Buenos Aires',
        'admin_address' => 'Perdriel 1240, CABA',
        'email' => 'info@infologargentina.com',
        'phone_display' => '+54 11 3535-3993',
        'phone_href' => 'tel:+541135353993',
        'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.7937848210195!2d-58.386487084502114!3d-34.65991046798096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccca7c89b3c2d%3A0x39e4bb0660acb025!2sTte.%20Gral.%20Garc%C3%ADa%20629%2C%20Pi%C3%B1eyro%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1582774842550!5m2!1ses-419!2sar',
    ],

    'stats' => [
        ['figure' => '1.000.000+', 'label' => 'elementos catalogados de forma unívoca'],
        ['figure' => '11.000 m²', 'label' => 'de superficie, 4.500 m² cubiertos'],
        ['figure' => '1909–2026', 'label' => 'del pozo N.º 5 a la sísmica 3D de Vaca Muerta'],
        ['figure' => 'ISO 9001', 'label' => 'sistema de gestión de calidad certificado'],
    ],

    'roadmap' => [
        [
            'tag' => '01',
            'title' => 'Infraestructura de laboratorios',
            'body' => 'Modernización integral de la sala de examen de muestras físicas, con equipamiento avanzado para los profesionales visitantes.',
        ],
        [
            'tag' => '02',
            'title' => 'Remasterización digital',
            'body' => 'Recuperación y migración de datos sísmicos históricos desde soportes magnéticos obsoletos hacia almacenamiento masivo perdurable.',
        ],
        [
            'tag' => '03',
            'title' => 'Georreferenciación con valor agregado',
            'body' => 'Digitalización de proyectos exploratorios 3D aún en papel, integrados a bases de datos georreferenciadas por GPS.',
        ],
    ],

    'servicios' => [
        'almacenamiento-y-distribucion' => [
            'title' => 'Almacenamiento y distribución de documentos',
            'summary' => 'Personal capacitado para resolver rápidamente lo demandado por nuestro cliente.',
            'image' => '/images/dataBase.jpg',
            'body' => [
                'Gestionamos la guarda física de documentación técnica bajo condiciones controladas de temperatura, humedad y seguridad, con protocolos de préstamo, devolución e ingreso que garantizan trazabilidad total de cada movimiento.',
                'El régimen de distribución está pensado para la operación real de la industria: centenares de materiales se mueven mensualmente entre el archivo y los equipos técnicos que los requieren, sin comprometer la integridad de los soportes originales.',
            ],
        ],
        'digitalizacion-geologica' => [
            'title' => 'Digitalización de información geológica',
            'summary' => 'Conversión de datos de registros de pozos a formatos digitales de alta fidelidad.',
            'image' => '/images/digitalizacion1.png',
            'body' => [
                'Convertimos registros de pozos, perfiles y mapas geológicos en datos digitales listos para los flujos de trabajo de interpretación actuales, preservando la resolución y el valor técnico del material original.',
                'Este proceso es central en nuestra hoja de ruta de modernización: incluye la georreferenciación GPS de proyectos exploratorios 3D que todavía existen únicamente en papel.',
            ],
        ],
        'guarda-coronas-cutting' => [
            'title' => 'Guarda de coronas y cutting',
            'summary' => 'Máxima organicidad para una clasificación correcta.',
            'image' => '/images/coronaCutting.png',
            'body' => [
                'La Petroteca de Infolog resguarda muestras de roca —coronas y cutting— de yacimientos de todo el país, clasificadas de forma unívoca para que cada elemento pueda localizarse y estudiarse con precisión.',
                'Especialistas, geólogos y geofísicos de la industria acceden a estas muestras en nuestras salas de estudio para el análisis directo del material extraído en superficie y subsuelo.',
            ],
        ],
        'guarda-soportes-magneticos' => [
            'title' => 'Guarda de soportes magnéticos',
            'summary' => 'Perfecta preservación de los recursos.',
            'image' => '/images/soportesMagneticos.png',
            'body' => [
                'Custodiamos soportes magnéticos históricos —muchos en formatos ya descontinuados por la industria de la computación— bajo condiciones de conservación que evitan su deterioro.',
                'En paralelo, avanzamos con la remasterización digital de estos soportes: revalidamos el dato original y lo migramos a plataformas de almacenamiento masivo perdurable.',
            ],
        ],
        'gestion-calidad' => [
            'title' => 'Gestión de calidad',
            'summary' => 'Certificación ISO 9001 y membresía CEPERA respaldan cada proceso.',
            'image' => '/images/logo_boreauVeritas.png',
            'body' => [
                'Nuestro Sistema de Gestión de la Calidad está certificado bajo la norma internacional ISO 9001, con auditorías externas periódicas, cronogramas anuales de objetivos mensurables y planes de capacitación permanente para el equipo técnico.',
                'Somos miembros de la Cámara de Empresas Petroenergéticas de la República Argentina (CEPERA), y sostenemos programas proactivos de seguridad industrial, salud ocupacional y mitigación de riesgos —incluido un sistema fijo de protección contra incendios a base de gas Inergen, diseñado específicamente para no dañar soportes documentales ni digitales.',
            ],
        ],
        'escaneo-documentos' => [
            'title' => 'Escaneo de documentos',
            'summary' => 'Equipos de alta gama para el escaneo de hojas, perfiles, documentos y planos.',
            'image' => '/images/escaner.jpg',
            'body' => [
                'Contamos con equipos de escaneo de alta gama preparados para digitalizar hojas, perfiles de pozo, documentos técnicos y planos de gran formato, manteniendo la fidelidad del original.',
                'El resultado se integra a nuestras bases de datos de consulta interactiva, que simplifican y aceleran el acceso de los técnicos del sector a la información que necesitan.',
            ],
        ],
    ],

    'press' => [
        [
            'title' => 'INFOLOG: la clave en la gestión del mayor archivo de exploración petrolera de Sudamérica',
            'source' => 'Ser Industria',
            'author' => 'Darío Ríos',
            'date' => '30 de junio de 2026',
            'quote' => 'El archivo de exploración petrolífera más importante de América del Sur, un ecosistema de datos dinámico que resguarda la memoria geológica y geofísica del país.',
            'excerpt' => 'Un repaso a fondo por el rol de Infolog en el ecosistema energético: los dos pilares operativos del archivo —unidades localizables y trazabilidad total—, el sistema Inergen contra incendios que protege soportes de papel y servidores por igual, y el plan de reconversión tecnológica sobre laboratorios, remasterización digital y georreferenciación GPS.',
            'url' => 'https://www.serindustria.com.ar/infolog-la-clave-en-la-gestion-del-mayor-archivo-de-exploracion-petrolera-de-sudamerica/',
        ],
    ],

];
