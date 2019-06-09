<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html>
            <head>
            <!--Metadatos-->
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width-device-width, initial-scale=1" />
            <meta name="application-name" content="Powerlifting Asturias"/>
            <meta name="author" content="Pablo Fernández Peláez"/>
            <meta name="description" content="Aplicación sobre Powerlifting en Asturias"/>
            <meta name="keywords" content="Powerlifting, Asturias, competiciones, calendario, años"/>
                <link rel="stylesheet" type="text/css" href="../../Estilo/estiloRecords.css" />
            </head>

           <body>
               <header>
                   <h1>Récords</h1>

                   <nav>
                       <ul>
                           <li><a title="Menú principal"

                                  href="../../index.html">Inicio</a></li>

                           <li><a title="Noticias de actualidad"

                                  href="../../noticias.html">Noticias</a></li>

                           <li><a title="Calendario de competicionnes"

                                  href="../../calendario.html">Calendario</a></li>

                           <li><a title="Reglas del Powerlifting"

                                  href="../../reglas.html">Reglas</a></li>

                           <li><a title="Galería de imágenes"

                                  href="../../galeria.html">Galería</a></li>

                           <li><a title="Récords y competiciones"

                                  href="records.xml">Récords</a></li>

                           <li><a title="Películas deportivas"

                                  href="../../EcmaScript/peliculas.html">Películas deportivas</a></li>

                           <li><a title="Gimnasios destacados"

                                  href="../../EcmaScript/GimnasiosDestacados.html">Gimnasios Destacados</a></li>

                       </ul>
                   </nav>
               </header>
               <main>
                   <xsl:for-each select="records/record">
                       <section>
                           <h2>
                               <xsl:value-of select="atleta/nombreAtleta"/>
                           </h2>

                           <p> Edad: <xsl:value-of select="atleta/edadAtleta"/></p>
                           <p> Categoría de peso: <xsl:value-of select="atleta/catPeso"/></p>
                           <p> Categoría de edad: <xsl:value-of select="atleta/catEdad"/></p>
                           <p> Peso levantado: <xsl:value-of select="atleta/pesoLevantado"/></p>
                           <p> Movimiento: <xsl:value-of select="atleta/movimiento"/></p>

                           <h3>
                               Asociación: <xsl:value-of select="atleta/asociacion/nombreasociacion"/>
                           </h3>

                           <p>Localización: <xsl:value-of select="atleta/asociacion/localizacion"/></p>
                           <p>Número de miembros: <xsl:value-of select="atleta/asociacion/numMiembros"/></p>

                           <xsl:for-each select="atleta/asociacion/historias/historia">
                               <p> <xsl:value-of select="."/> </p>
                           </xsl:for-each>

                           <h2>
                               Competición: <xsl:value-of select="competicion/nombreCompeticion"/>
                           </h2>

                           <p>Lugar: <xsl:value-of select="competicion/lugar"/></p>
                           <p>Fecha: <xsl:value-of select="competicion/fecha"/></p>
                           <p>Número de participantes: <xsl:value-of select="competicion/numParticipantes"/></p>

                           <h3>
                               Patrocinadores
                           </h3>

                           <xsl:for-each select="competicion/patrocinadores/patrocinador">


                               <h4>
                                   <xsl:value-of select="nombrePatrocinador"/>
                               </h4>
                               <p> Sector: <xsl:value-of select="@sector"/> </p>
                               <p> Sede: <xsl:value-of select="sede"/> </p>
                               <p> Nombre director: <span><xsl:value-of select="director/nombreDirector"/> </span>
                                   <span><xsl:value-of select="director/apellidoDirector"/></span></p>
                               <p> Nacionalidad del director: <xsl:value-of select="director/nacionalidadDirector"/></p>
                               <p> Importe anual: <xsl:value-of select="director/importe"/></p>


                           </xsl:for-each>

                           <h3>
                               Categorías:
                           </h3>

                           <xsl:for-each select="competicion/categorias/categoria">
                               <h4>
                                   <xsl:value-of select="nombreCategoria"/>
                               </h4>
                               <p>Premio: <xsl:value-of select="puesto/premioEuros"/></p>
                               <p>Título: <xsl:value-of select="puesto/titulo"/></p>
                           </xsl:for-each>

                       </section>

                   </xsl:for-each>
               </main>

           </body>

        </html>

    </xsl:template>
</xsl:stylesheet>