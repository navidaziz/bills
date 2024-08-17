<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container" style="padding: 10px;">

        <style>
            .code-container {
                position: relative;
            }

            pre code {
                padding: 0;
                font-size: 9px;
                color: inherit;
                white-space: pre-wrap;
                background-color: transparent;
                border-radius: 0;
            }

            .copy-button {
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
                font-size: 14px;
            }

            .pre-container {
                overflow-x: auto;
                /* Add horizontal scrollbar if content overflows */
                max-width: 100%;
                /* Ensure pre block doesn't extend beyond its container */
            }

            .code-block {
                white-space: pre-wrap;
                /* Preserve white space, wrap long lines */
                font-family: monospace;
                /* Use monospace font for code */
                font-size: 8px;
                /* Adjust font size as needed */
                margin: 0;
                /* Remove default margin */
                padding: 10px;
                /* Add padding for readability */
                border: 1px solid #ccc;
                /* Add border for visibility */
                border-radius: 5px;
                /* Add border radius for aesthetics */
            }
        </style>
        <script>
            $(document).ready(function() {
                $('.copy-button').click(function() {
                    var codeBlock = $('#' + $(this).prev('pre').find('code').attr('id'));
                    var codeText = codeBlock.text();

                    // Create a textarea element to hold the code
                    var textarea = $('<textarea></textarea>').val(codeText).appendTo('body').select();

                    // Copy the code to the clipboard
                    document.execCommand('copy');

                    // Remove the textarea
                    textarea.remove();

                    // Change button text briefly to indicate success
                    $(this).text('Code Copied!');
                    setTimeout(function() {
                        $('.copy-button').text('Copy Code');
                    }, 1500);
                });

                // Typewriter effect
                function typeWriter(element, text, speed) {
                    var i = 0;
                    if (text.length > 0) {
                        var interval = setInterval(function() {
                            element.append(text.charAt(i));
                            i++;
                            if (i > text.length) {
                                clearInterval(interval);
                            }
                        }, speed);
                    }
                }

                var codeElements = $('.code-container code');
                codeElements.each(function(index, element) {
                    var codeText = $(element).text();
                    $(element).empty(); // Clear existing text
                    typeWriter($(element), codeText, 0.9); // Typewriter effect
                });
            });
        </script>
        <div class="row">
            <div class="col-md-4">
                <div class="code-container">
                    <pre><code id="controller_code" ><?php echo htmlspecialchars($controller); ?></code></pre>
                    <button class="copy-button">Copy Code</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="code-container">
                    <pre><code id="list_view_code" ><?php echo htmlspecialchars($list_view); ?></code></pre>
                    <button class="copy-button">Copy Code</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="code-container">
                    <pre><code id="add_form_code"><?php echo htmlspecialchars($add_form); ?></code></pre>
                    <button class="copy-button">Copy Code</button>
                </div>
            </div>

        </div>

    </div>

</body>

</html>