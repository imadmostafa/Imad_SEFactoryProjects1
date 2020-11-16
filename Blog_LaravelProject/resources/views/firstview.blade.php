<!DOCTYPE html>
<html>
    <head>




<style>
    button,text{
        color:green;
        background-color : black
    }


    table, th, td
        {
            border: solid 1px #DDD;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center;
            align-items: center;
        }
        th {
            font-weight:bold;
            color:yellowgreen
        }
</style>

        <title>FUll STACK 2</title>
    </head>

    <body>
        <div id="root"></div>





        <h1> welcome firstview</h1>
        <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
            <form method="post" action="/addArticle">
                @csrf

                <textarea
                    name="body"
                    class="w-full"
                    placeholder="Add your Article Body here "
                    required
                    autofocus
                ></textarea>

                <hr class="my-4">

                <footer class="flex justify-between items-center">


                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow px-10 text-sm text-white h-10"
                    >
                        Publish
                    </button>
                </footer>
            </form>

            @error('body')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>


    </body>
</html>
