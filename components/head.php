<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BDC WordPress</title>

<script src="https://cdn.tiny.cloud/1/wesq6pzh85nnregorlsyzqemt5nzeua0na48mu0knruk158l/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!--Favicons-->
<link rel="icon" type="image/png" href="images/logo-BDC.png">

<!--Tailwinds-->
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    purple: {
                        100: '#B5A5DF',
                        200: '#AA96DA'
                    }
                }
            }
        },
        plugins: [
            require('@tailwindcss/forms'),
            require('flowbite/plugin')
        ]
    }
</script>