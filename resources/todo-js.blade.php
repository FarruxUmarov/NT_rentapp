<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .task-btn {
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
    <script src="script.js">
        const tasks = [];

        function fetchData() {
            const loader = document.querySelector('.loader')
            loader.style.display = 'inline-block'

            fetch('http://127.0.0.1:8000/api/users')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json()
                })
                .then(data => {
                    const tasks = data.map(user => user.name)

                    renderTasks(tasks)
                    loader.style.display = 'none'
                })
                .catch(error => console.error(error))
        }

        function send() {
            const data = new FormData()
            data.append('first_name', 'Abdurashid')

            fetch('http://127.0.0.1:8000/api/users', {
                'method': 'POST',
                'body': data
            })
                .then(response => console.info(response.data))
                .catch(error => console.warn(error.data))
        }

        const addBtn = document.querySelector('#add-btn')

        document.querySelector('#fetch')
            .addEventListener('click', fetchData)

        addBtn.addEventListener('click', addNewTask)

        function addNewTask() {
            const input = document.querySelector('#todo-input')
            const newTask = input.value.trim()
            send()

            if (newTask.length) {
                tasks.push(newTask)
                renderTasks(tasks)
                input.value = ''
            } else {
                alert("The information entered is incorrect")
            }
        }


        function renderTasks(tasks) {
            const list = document.querySelector('#todo-list')
            list.innerHTML = ''

            tasks.forEach(task => {
                const li = document.createElement('li');
                li.textContent = task
                list.appendChild(li)
            })
        }

        renderTasks(tasks)

        const input = document.querySelector('#todo-input')

        input.addEventListener('keyup', e => e.key === 'Enter' ? addNewTask() : void 0);
    </script>
</head>
<body>
<h1>JavaScript Todo</h1>
<button id="fetch">Fetch users</button>
<input type="text" id="todo-input" placeholder="Add a new task..."/>
<button id="add-btn">Add Task</button>
<ul id="todo-list"></ul>
<span class="loader"></span>
</body>
</html>
