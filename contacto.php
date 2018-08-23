<?php require_once('_head.php'); ?>
<title>Registro</title>
  </head>
<?php
//convoca al header
require_once('_header.php');
?>

<body>
    <main>
        
            
            <section class="contact-header">
           
                <h3>Contanos tu experiencia</h3>
            
            </section>
            <section class="contact-container">
                <article >
                    <form action="" class="contact-form">
                        
                            <input type="text" id="name" class="form-input" placeholder="Nombre y Apellido" require>
                        
                            <input type="email" id="email" class="form-input" placeholder="Email" require>
                        
                            <input type="number" id="telefono" class="form-input" placeholder="Numero de contacto">
                        
                            <input type="text" id="motivo" class="form-input" placeholder="Motivo de la consulta">
                        
                            
                            <textarea rows="4" cols="50" id="mensaje" class="form-input" placeholder="Mensaje"></textarea>
                            
                        </div>
                        <button class="form-row form-button" type="submit" name="send-contact">Enviar</button>
                    </form>
                </article>
                <article class="contact-info">
                    <p>contacto@##.com</p>
                </article>
            </section>
    
</main>
</body>


<?php
//convoca al footer
require_once('_footer.php');