function agregalinea(idprograma) {
    'use strict';
    document.getElementById('linea').length = 0;
    document.getElementById('linea').options[0] = new Option('-seleccione-', '0');
    document.getElementById('estrategia').length = 0;
    document.getElementById('estrategia').options[0] = new Option('-seleccione-', '0');
    switch (idprograma) {
        case "1":
            document.getElementById('linea').options[1] = new Option('1.1 Democracia y participación ciudadana', '1');
            document.getElementById('linea').options[2] = new Option('1.2 Gestión pública basada en resultados', '2');
            document.getElementById('linea').options[3] = new Option('1.3 Gobernanza electrónica', '3');
            document.getElementById('linea').options[4] = new Option('1.4 Transparencia y rendición de cuentas', '4');
            document.getElementById('linea').options[5] = new Option('1.5 Combate a la corrupción', '5');
            document.getElementById('linea').options[6] = new Option('1.6 Fortalecimiento municipal', '6');
            document.getElementById('linea').options[7] = new Option('1.7 Colaboración internacional', '7');
            break;
        case "2":
            document.getElementById('linea').options[1] = new Option('2.1 Derechos Humanos', '8');
            document.getElementById('linea').options[2] = new Option('2.2 Pobreza y desigualdad', '9');
            document.getElementById('linea').options[3] = new Option('2.3 Cohesión social', '10');
            document.getElementById('linea').options[4] = new Option('2.4 Salud y bienestar', '11');
            document.getElementById('linea').options[5] = new Option('2.5 Seguridad Pública', '12');
            document.getElementById('linea').options[6] = new Option('2.6 Acceso a la Justicia para Todos', '13');
            document.getElementById('linea').options[7] = new Option('2.7 Igualdad sustantiva entre mujeres y hombres', '14');
            document.getElementById('linea').options[8] = new Option('2.8 Oportunidades para las y los jóvenes', '15');
            document.getElementById('linea').options[9] = new Option('2.9 Gobierno promotor de la inclusión de las personas con discapacidad', '16');
            document.getElementById('linea').options[10] = new Option('2.10 Vinculación con las y los zacatecanos radicados en otras latitudes', '17');
            document.getElementById('linea').options[11] = new Option('2.11 Cultura física y deporte', '18');
            break;
        case "3":
            document.getElementById('linea').options[1] = new Option('3.1 Educación de Calidad', '19');
            document.getElementById('linea').options[2] = new Option('3.2 Innovación, Ciencia y Tecnología', '20');
            document.getElementById('linea').options[3] = new Option('3.3 Inversión Local, Nacional y Extranjera', '21');
            document.getElementById('linea').options[4] = new Option('3.4 Empleo', '22');
            document.getElementById('linea').options[5] = new Option('3.5 Infraestructura y equipamiento', '23');
            document.getElementById('linea').options[6] = new Option('3.6 Productividad en el Sector Agropecuario', '24');
            document.getElementById('linea').options[7] = new Option('3.7 Productividad en los sectores industrial y de servicios', '25');
            document.getElementById('linea').options[8] = new Option('3.8 Minería Sostenible', '26');
            document.getElementById('linea').options[9] = new Option('3.9 Turismo', '27');
            document.getElementById('linea').options[10] = new Option('3.10 Cultura y Economía Creativa', '28');
            break;
        case "4":
            document.getElementById('linea').options[1] = new Option('4.1 Recursos Naturales', '29');
            document.getElementById('linea').options[2] = new Option('4.2 Agua', '30');
            document.getElementById('linea').options[3] = new Option('4.3 Cambio Climático', '31');
            document.getElementById('linea').options[4] = new Option('4.4 Energías renovables', '32');
            document.getElementById('linea').options[5] = new Option('4.5 Manejo de residuos', '33');
            document.getElementById('linea').options[6] = new Option('4.6 Riesgos, vulnerabilidad y prevención de desastres', '34');
            document.getElementById('linea').options[7] = new Option('4.7 Desarrollo territorial y urbano', '35');
            document.getElementById('linea').options[8] = new Option('4.8 Vivienda digna y sustentable', '36');
            document.getElementById('linea').options[9] = new Option('4.9 Movilidad', '37');
            break;
    }
}

function agregaestrategia(idsubprograma) {
    document.getElementById('estrategia').length = 0;
    document.getElementById('estrategia').options[0] = new Option('-seleccione-', '');
    switch (idsubprograma) {
        case "1":
            document.getElementById('estrategia').options[1] = new Option('1.1.1 Fomentar la participación e involucramiento de la sociedad en los asuntos públicos...', '1');
            document.getElementById('estrategia').options[2] = new Option('1.1.2 Fortalecer la colaboración entre los poderes del Estado y órdenes de gobierno, a fin de ...', '2');
            document.getElementById('estrategia').options[3] = new Option('1.1.3 Implementar la participación social en la evaluación de la gestión pública...', '3');
            document.getElementById('estrategia').options[4] = new Option('1.1.4 Fomentar la legalidad y certeza jurídica en la acción gubernamental...', '4');
            break;
        case "2":
            document.getElementById('estrategia').options[1] = new Option('1.2.1 Implementar la planeación estratégica del Gobierno del Estado para una gestión transpar...', '5');
            document.getElementById('estrategia').options[2] = new Option('1.2.2 Ejercer finanzas públicas honestas,, eficientes y eficaces...', '6');
            document.getElementById('estrategia').options[3] = new Option('1.2.3 Optimizar el funcionamiento de la capacidad institucional de la Administración Pública E...', '7');
            document.getElementById('estrategia').options[4] = new Option('1.2.4 Profesionalización, actualización y evaluación de los servidores públicos...', '8');
            break;
        case "3":
            document.getElementById('estrategia').options[1] = new Option('1.3.1 Implementar un modelo de Gobernanza Electrónica...', '9');
            document.getElementById('estrategia').options[2] = new Option('1.3.2 Ampliar la red de infraestructura de telecomunicaciones en el territorio estatal...', '10');
            break;
        case "4":
            document.getElementById('estrategia').options[1] = new Option('1.4.1 Fortalecer la capacidad institucional para garantizar el acceso a la información, la rend...', '11');
            document.getElementById('estrategia').options[2] = new Option('1.4.2 Incentivar la participación ciudadana en el aprovechamiento de los medios de transparenci...', '12');
            break;
        case "5":
            document.getElementById('estrategia').options[1] = new Option('1.5.1 Implementar y consolidar el Sistema Estatal Anticorrupción...', '13');
            document.getElementById('estrategia').options[2] = new Option('1.5.2 Fortalecer a las instituciones para la prevención y el combate a la corrupción...', '14');
            break;
        case "6":
            document.getElementById('estrategia').options[1] = new Option('1.6.1 Fortalecer las capacidades institucionales de los Municipios...', '15');
            document.getElementById('estrategia').options[2] = new Option('1.6.2 Impulsar la colaboración regional y territorial...', '16');
            document.getElementById('estrategia').options[3] = new Option('1.6.3 Promover la insersión municipal en el ámbito internacional...', '17');
            break;
        case "7":
            document.getElementById('estrategia').options[1] = new Option('1.7.1 Fortalecer la colaboración con organismos internacionales promotores del desarrollo...', '18');
            document.getElementById('estrategia').options[2] = new Option('1.7.2 Fortalecer la promoción integral del Estado en el ámbito internacional...', '19');
            break;
        case "8":
            document.getElementById('estrategia').options[1] = new Option('2.1.1 Institucionalizar el enfoque de derechos humanos...', '20');
            document.getElementById('estrategia').options[2] = new Option('2.1.2 Promover la cultura de derechos humanos...', '21');
            document.getElementById('estrategia').options[3] = new Option('2.1.3 Garantizar el goce y ejercicio de los derechos humanos de las niñas, niños, adolescentes...', '22');
            break;
        case "9":
            document.getElementById('estrategia').options[1] = new Option('2.2.1 Implementar programas de reducción de la pobreza en todas sus dimensiones...', '23');
            document.getElementById('estrategia').options[2] = new Option('2.2.2 Impulsar la inversión pública para ampliar la infraestructura social...', '24');
            document.getElementById('estrategia').options[3] = new Option('2.2.3 Implementar el Sistema Estatal de Evaluación de la Política Social...', '25');
            document.getElementById('estrategia').options[4] = new Option('2.2.4 Impulsar la economía social...', '26');
            break;
        case "10":
            document.getElementById('estrategia').options[1] = new Option('2.3.1 Promover redes de intercambio social...', '27');
            document.getElementById('estrategia').options[2] = new Option('2.3.2 Reducir las brechas de marginación...', '28');
            document.getElementById('estrategia').options[3] = new Option('2.3.3 Convivencia social para el progreso de nuestras comunidades...', '29');
            break;
        case "11":
            document.getElementById('estrategia').options[1] = new Option('2.4.1 Garantizar que las y los zacatecanos tengan acceso efectivo a los servicios de salud...', '30');
            document.getElementById('estrategia').options[2] = new Option('2.4.2 Garantizar el acceso integral a la salud de la mujer...', '31');
            document.getElementById('estrategia').options[3] = new Option('2.4.3 Mejorar la calidad, eficiencia y coordinación sectorial en la prestación de servicios de...', '32');
            document.getElementById('estrategia').options[4] = new Option('2.4.4 Promover la cultura de la prevención y detección oportuna de enfermedades...', '33');
            document.getElementById('estrategia').options[5] = new Option('2.4.5 Fortalecer las acciones orientadas a la inocuidad y sanidad alimentaria...', '34');
            break;
        case "12":
            document.getElementById('estrategia').options[1] = new Option('2.5.1 Fortalecer la infraestructura y los mecanismos de actuación y colaboración de las funcio...', '35');
            document.getElementById('estrategia').options[2] = new Option('2.5.2 Impulsar la prevención de la violencia y delincuencia en el Estado...', '36');
            document.getElementById('estrategia').options[3] = new Option('2.5.3 Promover la readaptación y reinsersión social de indiviudos...', '37');
            break;
        case "13":
            document.getElementById('estrategia').options[1] = new Option('2.6.1 Consolidar el nuevo sistema de justicia penal...', '38');
            document.getElementById('estrategia').options[2] = new Option('2.6.2 Promover el acceso inclusivo a la justicia...', '39');
            document.getElementById('estrategia').options[3] = new Option('2.6.3 Fortalecer el acceso a la justicia para las mujeres...', '40');
            break;
        case "14":
            document.getElementById('estrategia').options[1] = new Option('2.7.1 Institucionalizar la perspectiva de género en la administración pública estatal y munic...', '41');
            document.getElementById('estrategia').options[2] = new Option('2.7.2 Fortalecer el acceso a las mujeres a una vida libre de violencia...', '42');
            document.getElementById('estrategia').options[3] = new Option('2.7.3 Promover la participación plena y efectiva de las mujeres y la igualdad de oportunidades ...', '43');
            break;
        case "15":
            document.getElementById('estrategia').options[1] = new Option('2.8.1 Fomentar el desarrollo integral de los jóvenes para insertarlos en todos los ámbitos pro...', '44');
            document.getElementById('estrategia').options[2] = new Option('2.8.2 Desorrollar mecanismos de coordinación y evaluación de acciones transisntitucionales a f...', '45');
            break;
        case "16":
            document.getElementById('estrategia').options[1] = new Option('2.9.1 Impulsar la inclusión de hombres y mujeres con discapacidad al desarrollo cultural, acad�...', '46');
            document.getElementById('estrategia').options[2] = new Option('2.9.2 Incrementar la accesibilidad universal...', '47');
            document.getElementById('estrategia').options[3] = new Option('2.9.3 Instalar centros de rehabilitación y centros geriátricos en los municipios del Estado...', '48');
            document.getElementById('estrategia').options[4] = new Option('2.9.4 Impulsar el derecho al cuidado...', '49');
            break;
        case "17":
            document.getElementById('estrategia').options[1] = new Option('2.10.1 Impulsar la protección y ejercicio pleno de los derechos de los migrantes...', '50');
            document.getElementById('estrategia').options[2] = new Option('2.10.2 Fortalecer los programas y mecanismos de cooperación con la comunidad migrante para prom...', '51');
            document.getElementById('estrategia').options[3] = new Option('2.10.3 Promover la inversión productiva de las remesas...', '52');
            break;
        case "18":
            document.getElementById('estrategia').options[1] = new Option('2.11.1 Desarrollar el deporte de alto rendimiento...', '53');
            document.getElementById('estrategia').options[2] = new Option('2.11.2 Incrementar las actividades físicas y deportivas...', '54');
            document.getElementById('estrategia').options[3] = new Option('2.11.3 Incentivar el uso de la infraestructura deportiva como espacio de convivencia para contri...', '55');
            break;
        case "19":
            document.getElementById('estrategia').options[1] = new Option('3.1.1 Implementar un nuevo modelo de enseñanza-aprendizaje para formar estudiantes responsables...', '56');
            document.getElementById('estrategia').options[2] = new Option('3.1.2 Fortalecer la gestión administrativa de la educación...', '57');
            document.getElementById('estrategia').options[3] = new Option('3.1.3 Ampliar la infraestructura física educativa pertinente y de calidad para dignificar la vi...', '58');
            document.getElementById('estrategia').options[4] = new Option('3.1.4 Incrementar la inclusión, el acceso y la permanencia de la población en el sistema educa...', '59');
            document.getElementById('estrategia').options[5] = new Option('3.1.5 Disminuir el rezago educativo en la población de 15 años y más...', '60');
            break;
        case "20":
            document.getElementById('estrategia').options[1] = new Option('3.2.1 Fomentar la formación de recursos humanos con perfil científico-tecnológico en el Estad...', '61');
            document.getElementById('estrategia').options[2] = new Option('3.2.2 Impulsar el emprendimiento de empresas de innovación tecnológica en la entidad...', '62');
            document.getElementById('estrategia').options[3] = new Option('3.2.3 Fortalecer el parque científico tecnológico y su vinculación con la economía zacatecan...', '63');
            document.getElementById('estrategia').options[4] = new Option('3.2.4 Promover la apropiación social y la divulgación de la ciencia, tecnología e innovación...', '64');
            document.getElementById('estrategia').options[5] = new Option('3.2.5 Fortalecer el sector de tecnologías de la información, industrial y de servicios, a trav...', '65');
            break;
        case "21":
            document.getElementById('estrategia').options[1] = new Option('3.3.1 Estimular la inversión local en sectores estratégicos...', '66');
            document.getElementById('estrategia').options[2] = new Option('3.3.2 Estimular la inversión nacional y extranjera...', '67');
            document.getElementById('estrategia').options[3] = new Option('3.3.3 Fortalecer las instituciones y agencias de promoción de inversiones y las incubadoras de ...', '68');
            break;
        case "22":
            document.getElementById('estrategia').options[1] = new Option('3.4.1 Fomentar la formación de habilidades laborales óptimas entre la población económicamen...', '69');
            document.getElementById('estrategia').options[2] = new Option('3.4.2 Vincular al sector educativo de la entidad (público y privado) con el sector productivo...', '70');
            document.getElementById('estrategia').options[3] = new Option('3.4.3 Potenciar de manera interinstitucional el talento para la creación de autoempleo...', '71');
            document.getElementById('estrategia').options[4] = new Option('3.4.4 Impulsar estrategias para la reducción del desempleo y el subempleo (subocupación)...', '72');
            document.getElementById('estrategia').options[5] = new Option('3.4.5 Aumentar la formalización de la economía, con un carácter social y distributivo...', '73');
            break;
        case "23":
            document.getElementById('estrategia').options[1] = new Option('3.5.1 Incrementar y conservar la conectividad intra e inter estatal...', '74');
            document.getElementById('estrategia').options[2] = new Option('3.5.2 Crear infraestructura tecnológica y productiva para el impulso industrial, comercial y de...', '75');
            break;
        case "24":
            document.getElementById('estrategia').options[1] = new Option('3.6.1 Fortalecer y diversificar la agricultura sostenible...', '76');
            document.getElementById('estrategia').options[2] = new Option('3.6.2 Incrementar la productividad en la ganadería, silvicultura y pesca...', '77');
            document.getElementById('estrategia').options[3] = new Option('3.6.3 Impulsar alianzas estratégicas para promover la agroindustria...', '78');
            document.getElementById('estrategia').options[4] = new Option('3.6.4 Garantizar la sostenibilidad del recurso hídrico en el sector...', '79');
            break;
        case "25":
            document.getElementById('estrategia').options[1] = new Option('3.7.1 Ampliar el uso de la tecnología y la innovación en el sector industrial y empresarial...', '80');
            document.getElementById('estrategia').options[2] = new Option('3.7.2 Fortalecer el acceso a los esquemas de financiamiento para MIPyMES...', '81');
            document.getElementById('estrategia').options[3] = new Option('3.7.3 Fomentar la industrialización de procesos que proporcionen valor agregado a productos loc...', '82');
            document.getElementById('estrategia').options[4] = new Option('3.7.4 Fomentar el emprendimiento mediante asesoría y mecanismos de financiamiento...', '83');
            document.getElementById('estrategia').options[5] = new Option('3.7.5 Promover el encadenamiento de las MIPYMES a los sectores estratégicos...', '84');
            document.getElementById('estrategia').options[6] = new Option('3.7.6 Apertura de nuevos mercados nacionales e internacionales y cadenas de valor para los produ...', '85');
            break;
        case "26":
            document.getElementById('estrategia').options[1] = new Option('3.8.1 Promover la inversión del sector minero, privilegiando la que tenga una visión y manejo ...', '86');
            document.getElementById('estrategia').options[2] = new Option('3.8.2 Fortalecer la cadena de valor del sector minero y su productividad...', '87');
            document.getElementById('estrategia').options[3] = new Option('3.8.3 Ampliar y diversificar las actividades económicas y productivas en los distritos mineros ...', '88');
            document.getElementById('estrategia').options[4] = new Option('3.8.4 Implementar vínculos con el sector educativo estatal para la formación de profesionistas...', '89');
            break;
        case "27":
            document.getElementById('estrategia').options[1] = new Option('3.9.1 Ampliar la oferta turística, la profesionalización y capacitación del sector...', '90');
            document.getElementById('estrategia').options[2] = new Option('3.9.2 Incrementar la inversión y aprovechar la infraestructura con potencial turístico en áre...', '91');
            break;
        case "28":
            document.getElementById('estrategia').options[1] = new Option('3.10.1 Proteger, crear, preservar y difundir la cultura y el patrimonio cultural tanto material ...', '92');
            document.getElementById('estrategia').options[2] = new Option('3.10.2 Incrementar la formación de docentes, talentos, artistas y artesanos...', '93');
            document.getElementById('estrategia').options[3] = new Option('3.10.3 Construir y rehabilitar espacios dignos y apropiados para el acceso y difusión de las ma...', '94');
            document.getElementById('estrategia').options[4] = new Option('3.10.4 Desarrollar la industria cultural y creativa...', '95');
            break;
        case "29":
            document.getElementById('estrategia').options[1] = new Option('4.1.1 Promover el uso sostenible de los ecosistemas del Estado...', '96');
            document.getElementById('estrategia').options[2] = new Option('4.1.2 Fomentar la rehabilitación de ecosistemas degradados...', '97');
            document.getElementById('estrategia').options[3] = new Option('4.1.3 Impulsar mecanismos para la protección y conservación de ecosistemas...', '98');
            break;
        case "30":
            document.getElementById('estrategia').options[1] = new Option('4.2.1 Gestión integrada del agua...', '99');
            document.getElementById('estrategia').options[2] = new Option('4.2.2 Incrementar la seguridad hídrica...', '100');
            document.getElementById('estrategia').options[3] = new Option('4.2.3 Fortalecer el abastecimiento de agua y el acceso a los servicios de agua potable...', '101');
            document.getElementById('estrategia').options[4] = new Option('4.2.4 Fortalecer el saneamiento y reuso del agua...', '102');
            document.getElementById('estrategia').options[5] = new Option('4.2.5 Fortalecer la cultura del cuidado del agua...', '103');
            break;
        case "31":
            document.getElementById('estrategia').options[1] = new Option('4.3.1 Diseñar programas encaminados a la mitigación y adaptación de los efectos negativos del...', '104');
            document.getElementById('estrategia').options[2] = new Option('4.3.2 Fomentar la educación, el desarrollo e investigación científica y transferencia de tecn...', '105');
            document.getElementById('estrategia').options[3] = new Option('4.3.3 Adoptar el compromiso contraido en el Convenio Marco de la Naciones Unidas sobre Cambio Cl...', '106');
            break;
        case "32":
            document.getElementById('estrategia').options[1] = new Option('4.4.1 Aprovechar el potencial de la entidad en la generación de energías alternativas...', '107');
            document.getElementById('estrategia').options[2] = new Option('4.4.2 Impulsar la participación de instituciones de educación en la investigación, capacitaci...', '108');
            document.getElementById('estrategia').options[3] = new Option('4.4.3 Establecer un marco institucional para fomentar el uso masivo de energías alternativas...', '109');
            break;
        case "33":
            document.getElementById('estrategia').options[1] = new Option('4.5.1 Prevención y gestión integral de los residuos solidos a nivel municipal y regional...', '110');
            document.getElementById('estrategia').options[2] = new Option('4.5.2 Promover el manejo integral de los diferentes tipos de residuos generados en la entidad...', '111');
            document.getElementById('estrategia').options[3] = new Option('4.5.3 Desarrollo de capacidades locales en materia de gestión integral de residuos...', '112');
            document.getElementById('estrategia').options[4] = new Option('4.5.4 Disposición final de residuos solidos en cumplimiento de la normatividad ambiental...', '113');
            document.getElementById('estrategia').options[5] = new Option('4.5.5 Aprovechamiento y valorización de los residuos solidos...', '114');
            document.getElementById('estrategia').options[6] = new Option('4.5.6 Participación social en el manejo de residuos...', '115');
            break;
        case "34":
            document.getElementById('estrategia').options[1] = new Option('4.6.1 Identificar las amenazas que pueden tener consecuencias desastrosas y determinar formas de...', '116');
            document.getElementById('estrategia').options[2] = new Option('4.6.2 Impulsar la prevención como mecanismo para mitigar y reducir oportunamente el impacto de ...', '117');
            document.getElementById('estrategia').options[3] = new Option('4.6.3 Fortalecer los protocolos de atención inmediata ante situaciones de desastre...', '118');
            break;
        case "35":
            document.getElementById('estrategia').options[1] = new Option('4.7.1 Impulsar el desarrollo territorial equilibrado...', '119');
            document.getElementById('estrategia').options[2] = new Option('4.7.2 Implementar una política de desarrollo urbano integral y sostenible...', '120');
            document.getElementById('estrategia').options[3] = new Option('4.7.3 Consolidar el desarrollo metropolitano...', '121');
            document.getElementById('estrategia').options[4] = new Option('4.7.4 Impulsar la regularización de la tenencia de la tierra en predios urbanos y fraccionamien...', '122');
            document.getElementById('estrategia').options[5] = new Option('4.7.5 Modernización catastral y registral...', '123');
            document.getElementById('estrategia').options[6] = new Option('4.7.6 Ampliar y complementar el equipamiento urbano para el desarrollo de ciudades sustentables ...', '124');
            break;
        case "36":
            document.getElementById('estrategia').options[1] = new Option('4.8.1 Promover la construcción de vivienda ordenada y sustentable...', '125');
            document.getElementById('estrategia').options[2] = new Option('4.8.2 Promover programas de apoyos para el mejoramiento de vivienda...', '126');
            break;
        case "37":
            document.getElementById('estrategia').options[1] = new Option('4.9.1 Impulsar el dinamismo del transporte a través de Planes Integrales de Movilidad...', '127');
            document.getElementById('estrategia').options[2] = new Option('4.9.2 Modernizar y dar mantenimiento a la infraestructura vial en la entidad...', '128');
            document.getElementById('estrategia').options[3] = new Option('4.9.3 Proponer nuevas alternativas de movilidad urbana...', '129');
            break;
    }
}

function agregafuncion(idfinalidad) {
    document.getElementById('funcion').length = 0;
    document.getElementById('funcion').options[0] = new Option('-seleccione-', '');
    document.getElementById('subfuncion').length = 0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-', '');
    document.getElementById('id_finalidad').value = idfinalidad;
    switch (idfinalidad) {
        case "1":
            document.getElementById('funcion').options[1] = new Option('LEGISLACIÓN', '1');
            document.getElementById('funcion').options[2] = new Option('JUSTICIA', '2');
            document.getElementById('funcion').options[3] = new Option('COORDINACIÓN DE LA POLÍTICA DE GOBIERNO', '3');
            document.getElementById('funcion').options[4] = new Option('RELACIONES EXTERIORES', '4');
            document.getElementById('funcion').options[5] = new Option('ASUNTOS FINANCIEROS Y HACENDARIOS', '5');
            document.getElementById('funcion').options[6] = new Option('SEGURIDAD NACIONAL', '6');
            document.getElementById('funcion').options[7] = new Option('ASUNTOS DE ORDEN PÚBLICO Y DE SEGURIDAD INTERIOR', '7');
            document.getElementById('funcion').options[8] = new Option('OTROS SERVICIOS GENERALES', '8');
            break;
        case "2":
            document.getElementById('funcion').options[1] = new Option('PROTECCIÓN AMBIENTAL', '1');
            document.getElementById('funcion').options[2] = new Option('VIVIENDA Y SERVICIOS A LA COMUNIDAD', '2');
            document.getElementById('funcion').options[3] = new Option('SALUD', '3');
            document.getElementById('funcion').options[4] = new Option('RECREACIÓN, CULTURA Y OTRAS MANIFESTACIONES SOCIALES', '4');
            document.getElementById('funcion').options[5] = new Option('EDUCACIÓN', '5');
            document.getElementById('funcion').options[6] = new Option('PROTECCIÓN SOCIAL', '6');
            document.getElementById('funcion').options[7] = new Option('OTROS ASUNTOS SOCIALES', '7');
            break;
        case "3":
            document.getElementById('funcion').options[1] = new Option('ASUNTOS ECONÓMICOS, COMERCIALES Y LABORALES EN GENERAL', '1');
            document.getElementById('funcion').options[2] = new Option('AGROPECUARIA, SILVICULTURA, PESCA Y CAZA', '2');
            document.getElementById('funcion').options[3] = new Option('COMBUSTIBLES Y ENERGÍA', '3');
            document.getElementById('funcion').options[4] = new Option('MINERÍA, MANUFACTURAS Y CONSTRUCCIÓN', '4');
            document.getElementById('funcion').options[5] = new Option('TRANSPORTE', '5');
            document.getElementById('funcion').options[6] = new Option('COMUNICACIONES', '6');
            document.getElementById('funcion').options[7] = new Option('TURISMO', '7');
            document.getElementById('funcion').options[8] = new Option('CIENCIA, TECNOLOGÍA E INNOVACIÓN', '8');
            document.getElementById('funcion').options[9] = new Option('OTRAS INDUSTRIAS Y OTROS ASUNTOS ECONÓMICOS', '9');
            break;
        case "4":
            document.getElementById('funcion').options[1] = new Option('TRANSACCIONES DE LA DEUDA PÚBLICA / COSTO FINANCIEROS DE LA DEUDA', '1');
            document.getElementById('funcion').options[2] = new Option('TRANSFERENCIAS, PARTICIPACIONES Y APORTACIONES ENTRE DIFERENTES NIVELES Y ÓRDENES DE GOBIERNO', '2');
            document.getElementById('funcion').options[3] = new Option('SANEAMIENTO DEL SISTEMA FINANCIERO', '3');
            document.getElementById('funcion').options[4] = new Option('ADEUDOS DE EJERCICIOS FISCALES ANTERIORES', '4');
            break;
    }
}

function agregasubfuncion(idfuncion) {
    document.getElementById('subfuncion').length = 0;
    document.getElementById('subfuncion').options[0] = new Option('-seleccione-', '');
    var idfinalidad = document.getElementById('id_finalidad').value;
    var clave_subfondo = idfinalidad + idfuncion;
    switch (clave_subfondo) {
        case "11":
            document.getElementById('subfuncion').options[1] = new Option('Legislación', '1');
            document.getElementById('subfuncion').options[2] = new Option('Fiscalización', '2');
            break;
        case "12":
            document.getElementById('subfuncion').options[1] = new Option('Impartición de Justicia', '3');
            document.getElementById('subfuncion').options[2] = new Option('Procuración de Justicia', '4');
            document.getElementById('subfuncion').options[3] = new Option('Reclusión y Readaptación Social', '5');
            document.getElementById('subfuncion').options[4] = new Option('Derechos Humanos', '6');
            break;
        case "13":
            document.getElementById('subfuncion').options[1] = new Option('Presidencia / Gubernamental', '7');
            document.getElementById('subfuncion').options[2] = new Option('Política Interior', '8');
            document.getElementById('subfuncion').options[3] = new Option('Preservación y Cuidado del Patrimonio', '9');
            document.getElementById('subfuncion').options[4] = new Option('Función Pública', '10');
            document.getElementById('subfuncion').options[5] = new Option('Asuntos Jurídicos', '11');
            document.getElementById('subfuncion').options[6] = new Option('Organización del Procesos Electorales', '12');
            document.getElementById('subfuncion').options[7] = new Option('Población', '13');
            document.getElementById('subfuncion').options[8] = new Option('Territorio', '14');
            document.getElementById('subfuncion').options[9] = new Option('Otros', '15');
            break;
        case "14":
            document.getElementById('subfuncion').options[1] = new Option('Relaciones Exteriores', '16');
            break;
        case "15":
            document.getElementById('subfuncion').options[1] = new Option('Asuntos Financieros', '17');
            document.getElementById('subfuncion').options[2] = new Option('Asuntos Hacendarios', '18');
            break;
        case "16":
            document.getElementById('subfuncion').options[1] = new Option('Defensa', '19');
            document.getElementById('subfuncion').options[2] = new Option('Marina', '20');
            document.getElementById('subfuncion').options[3] = new Option('Inteligencia para la Preservación de la Seguridad Nacional', '21');
            break;
        case "17":
            document.getElementById('subfuncion').options[1] = new Option('Policía', '22');
            document.getElementById('subfuncion').options[2] = new Option('Protección Civil', '23');
            document.getElementById('subfuncion').options[3] = new Option('Otros Asuntos de Orden Público y Seguridad', '24');
            document.getElementById('subfuncion').options[4] = new Option('Sistema Nacional de Seguridad Pública', '25');
            break;
        case "18":
            document.getElementById('subfuncion').options[1] = new Option('Servicios Registrales, Administrativos y Patrimoniales', '26');
            document.getElementById('subfuncion').options[2] = new Option('Servicios Estadistícos', '27');
            document.getElementById('subfuncion').options[3] = new Option('Servicios de Comunicación y Medios', '28');
            document.getElementById('subfuncion').options[4] = new Option('Acceso a la Información Pública Gubernamental', '29');
            document.getElementById('subfuncion').options[5] = new Option('Otros', '30');
            break;
        case "21":
            document.getElementById('subfuncion').options[1] = new Option('Ordenación de Desechos', '31');
            document.getElementById('subfuncion').options[2] = new Option('Adminstración del Agua', '32');
            document.getElementById('subfuncion').options[3] = new Option('Ordenación de Aguas Residuales, Drenajes y Alcantarillado', '33');
            document.getElementById('subfuncion').options[4] = new Option('Reducción de la Contaminación', '34');
            document.getElementById('subfuncion').options[5] = new Option('Protección de la Diversidad Biológica y del Paisaje', '35');
            document.getElementById('subfuncion').options[6] = new Option('Otros de Protección Ambiental', '36');
            break;
        case "22":
            document.getElementById('subfuncion').options[1] = new Option('Urbanización', '37');
            document.getElementById('subfuncion').options[2] = new Option('Desarrollo Cominitario', '38');
            document.getElementById('subfuncion').options[3] = new Option('Abastecimiento de Agua', '39');
            document.getElementById('subfuncion').options[4] = new Option('Alumbrado Público', '40');
            document.getElementById('subfuncion').options[5] = new Option('Vivienda', '41');
            document.getElementById('subfuncion').options[6] = new Option('Servicios Comunales', '42');
            document.getElementById('subfuncion').options[7] = new Option('Desarrollo Regional', '43');
            break;
        case "23":
            document.getElementById('subfuncion').options[1] = new Option('Prestación de Servicios de Salud a la Comunidad', '44');
            document.getElementById('subfuncion').options[2] = new Option('Prestación de Servicios de Salud a la Persona', '45');
            document.getElementById('subfuncion').options[3] = new Option('Generación de Recursos para la Salud', '46');
            document.getElementById('subfuncion').options[4] = new Option('Rectoría del Sistema de Salud', '47');
            document.getElementById('subfuncion').options[5] = new Option('Protección Social en Salud', '48');
            break;
        case "24":
            document.getElementById('subfuncion').options[1] = new Option('Deporte y Recreación', '49');
            document.getElementById('subfuncion').options[2] = new Option('Cultura', '50');
            document.getElementById('subfuncion').options[3] = new Option('Radio, Televisión y Editoriales', '51');
            document.getElementById('subfuncion').options[4] = new Option('Asuntos Religiosos y Otras Manifestaciones Sociales', '52');
            break;
        case "25":
            document.getElementById('subfuncion').options[1] = new Option('Educación Básica', '53');
            document.getElementById('subfuncion').options[2] = new Option('Educación Media Superios', '54');
            document.getElementById('subfuncion').options[3] = new Option('Educación Superior', '55');
            document.getElementById('subfuncion').options[4] = new Option('Postgrado', '56');
            document.getElementById('subfuncion').options[5] = new Option('Educación para Adultos', '57');
            document.getElementById('subfuncion').options[6] = new Option('Otros Servicios Educativos y Actividades Inherentes', '58');
            break;
        case "26":
            document.getElementById('subfuncion').options[1] = new Option('Enfermedad e Incapacidad', '59');
            document.getElementById('subfuncion').options[2] = new Option('Edad Avanzada', '60');
            document.getElementById('subfuncion').options[3] = new Option('Familia e Hijos', '61');
            document.getElementById('subfuncion').options[4] = new Option('Desempleo', '62');
            document.getElementById('subfuncion').options[5] = new Option('Alimentación y Nutrición', '63');
            document.getElementById('subfuncion').options[6] = new Option('Apoyo Social para la Vivienda', '64');
            document.getElementById('subfuncion').options[7] = new Option('Indigenas', '65');
            document.getElementById('subfuncion').options[8] = new Option('Otros Grupos Vulnerables', '66');
            document.getElementById('subfuncion').options[9] = new Option('Otros de Seguridad Social y Asistencia Social', '67');
            break;
        case "27":
            document.getElementById('subfuncion').options[1] = new Option('Otros Asuntos Sociales', '68');
            break;
        case "31":
            document.getElementById('subfuncion').options[1] = new Option('Asuntos Económicos y Comerciales en General', '69');
            document.getElementById('subfuncion').options[2] = new Option('Asuntos Laborales Generales', '70');
            break;
        case "32":
            document.getElementById('subfuncion').options[1] = new Option('Agropecuaria', '71');
            document.getElementById('subfuncion').options[2] = new Option('Silvicultura', '72');
            document.getElementById('subfuncion').options[3] = new Option('Acuacultura, Pezca y Caza', '73');
            document.getElementById('subfuncion').options[4] = new Option('Agroindustrial', '74');
            document.getElementById('subfuncion').options[5] = new Option('Hidroagrícola', '75');
            document.getElementById('subfuncion').options[6] = new Option('Apoyo Financiero a la Banca y Seguro Agropecuario', '76');
            break;
        case "33":
            document.getElementById('subfuncion').options[1] = new Option('Carbón y Otros Combustibles Minerales Sólidos', '77');
            document.getElementById('subfuncion').options[2] = new Option('Petróleo y Gas Natural (Hidricarburos)', '78');
            document.getElementById('subfuncion').options[3] = new Option('Combustibles Nucleares', '79');
            document.getElementById('subfuncion').options[4] = new Option('Otros Combutibles', '80');
            document.getElementById('subfuncion').options[5] = new Option('Electricidad', '81');
            document.getElementById('subfuncion').options[6] = new Option('Energía no Eléctrica', '82');
            break;
        case "34":
            document.getElementById('subfuncion').options[1] = new Option('Extracción de Recursos Minerales excepto los Combustibles Minerales', '83');
            document.getElementById('subfuncion').options[2] = new Option('Manufacturas ', '84');
            document.getElementById('subfuncion').options[3] = new Option('Contrucción', '85');
            break;
        case "35":
            document.getElementById('subfuncion').options[1] = new Option('Transporte por Carretera', '86');
            document.getElementById('subfuncion').options[2] = new Option('Transporte por Agua y Puertos', '87');
            document.getElementById('subfuncion').options[3] = new Option('Transporte por Ferrocarril', '88');
            document.getElementById('subfuncion').options[4] = new Option('Transporte Aéreo', '89');
            document.getElementById('subfuncion').options[5] = new Option('Transporte por Oleoductos y Gasoducto y Otros Sistemas de Transporte', '90');
            document.getElementById('subfuncion').options[6] = new Option('Otros Relacionados con Transporte', '91');
            break;
        case "36":
            document.getElementById('subfuncion').options[1] = new Option('Comunicaciones', '92');
            break;
        case "37":
            document.getElementById('subfuncion').options[1] = new Option('Turismo', '93');
            document.getElementById('subfuncion').options[2] = new Option('Hoteles y Restaurantes', '94');
            break;
        case "38":
            document.getElementById('subfuncion').options[1] = new Option('Investigación Científica', '95');
            document.getElementById('subfuncion').options[2] = new Option('Desarrollo Tecnológico', '96');
            document.getElementById('subfuncion').options[3] = new Option('Servicios Científicos y Tecnológicos', '97');
            document.getElementById('subfuncion').options[4] = new Option('Innovación', '98');
            break;
        case "39":
            document.getElementById('subfuncion').options[1] = new Option('Comercio, Distribución, Almacenamiento y Depósito', '99');
            document.getElementById('subfuncion').options[2] = new Option('Otras Indutrias', '100');
            document.getElementById('subfuncion').options[3] = new Option('Otros Asuntos Económicos', '101');
            break;
        case "41":
            document.getElementById('subfuncion').options[1] = new Option('Deuda Pública Interna', '102');
            document.getElementById('subfuncion').options[2] = new Option('Deuda Pública Externa', '103');
            break;
        case "42":
            document.getElementById('subfuncion').options[1] = new Option('Transferencia entre Diferentes Niveles y Ã?rdenes de Gobierno', '104');
            document.getElementById('subfuncion').options[2] = new Option('Participaciones entre Diferentes Niveles y Ã?rdenes de Gobierno', '105');
            document.getElementById('subfuncion').options[3] = new Option('Aportaciones entre Diferentes Ã?rdenes de Gobierno', '106');
            break;
        case "43":
            document.getElementById('subfuncion').options[1] = new Option('Saneamiento del Sistema Financiero', '107');
            document.getElementById('subfuncion').options[2] = new Option('Apoyos IPAB', '108');
            document.getElementById('subfuncion').options[3] = new Option('Banca de Desarrollo', '109');
            document.getElementById('subfuncion').options[4] = new Option('Apoyo a los Programas de reestructura en unidades de inversión (UDIS)', '110');
            break;
        case "44":
            document.getElementById('subfuncion').options[1] = new Option('Adeudos de Ejercicios Fiscales Anteriores', '111');
            break;
    }
}

function regresar(){
    location.href="main.php?token=c4ca4238a0b923820dcc509a6f75849b";
}

$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
});

 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });

