<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            font-weight: 600;
        }

        /* Form Styling */
        .add-task-form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .add-task-form input[type="text"] {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .add-task-form input[type="text"]:focus {
            outline: none;
            border-color: #3498db;
        }

        .add-task-form button {
            background: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .add-task-form button:hover {
            background: #2980b9;
        }

        /* Task List Styling */
        .task-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .task {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .task:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .task-title {
            flex: 1;
            font-size: 16px;
            color: #2c3e50;
        }

        .completed .task-title {
            text-decoration: line-through;
            color: #95a5a6;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .toggle-btn, .delete-btn {
            border: none;
            padding: 8px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .toggle-btn {
            background: #2ecc71;
            color: white;
        }

        .toggle-btn:hover {
            background: #27ae60;
        }

        .completed .toggle-btn {
            background: #95a5a6;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            h1 {
                font-size: 2em;
            }

            .add-task-form {
                flex-direction: column;
            }

            .add-task-form button {
                width: 100%;
            }

            .actions {
                flex-direction: column;
            }

            .toggle-btn, .delete-btn {
                width: 100%;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .task {
            animation: fadeIn 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✨ Todo List</h1>
        
        <!-- Add Task Form -->
        <form action="index.php?action=add" method="POST" class="add-task-form">
            <input type="text" name="title" placeholder="Add new task..." required>
            <button type="submit">Add</button>
        </form>

        <!-- Tasks List -->
        <div class="task-list">
            <?php foreach ($tasks as $task): ?>
                <div class="task <?php echo $task['completed'] ? 'completed' : ''; ?>">
                    <span class="task-title">
                        <?php echo htmlspecialchars($task['title']); ?>
                    </span>
                    <div class="actions">
                        <form action="index.php?action=toggle" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <button type="submit" class="toggle-btn">
                                <?php echo $task['completed'] ? '↩ Undo' : '✓ Done'; ?>
                            </button>
                        </form>
                        <form action="index.php?action=delete" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                            <button type="submit" class="delete-btn">🗑 Remove</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
