<html>

    <head>
        <title>Generating HTML From PHP</title>
    </head>

    <body>
        <h1>Generating HTML From PHP</h1>
        <?php

            //
            // Example script to output HTML tags
            //
            print ("Using PHP has <i>some advantages:</i>");
            print ("<ul><li>Speed</li><li>Ease of use</li><li>Functionality</li></ul>"); //Output bullet list
            print ("</body></html>");
            
            # current version of PHP
            echo "PHP v", phpversion();
            
            /**
             * Multi-line comment
             */
        ?>