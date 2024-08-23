<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/899c89402d.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Income
                        </h5>
                        <p class="card-text">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">
                            Monefy
                        </h5>
                        <h6 class="card-subtitle text-muted mb-4" style="text-align: center">
                            Track your income and expense
                        </h6>
                        <p class="card-text" style="text-align: center">Total Balance <br></p>
                        <h4 id="balance" style="text-align: center">0</h4>
                        <hr class="solid" style="border-top: 0.5 px solid #bbb;">
                        <form action="" class="mb-4">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type:</label>
                                        <select class="form-control" name="type" id="type">
                                            <option id="income-type" value="income">Income</option>
                                            <option id="expense-type" value="expense">Expense</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Category:</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="" selected>Category</option>
                                            <option id="income-type" value="income">Income</option>
                                            <option id="expense-type" value="expense">Expense</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Amount:</label>
                                        <input type="number" class="form-control" id="amount" name="amount">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control" id="date">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                        <table class="table w-100 overflow-y">
                            <tbody>
                                
                                <td>
                                    <div class="text-white" style="border-radius: 50%; display:inline-block; background-color: #4caf50; padding: 25% 35%;">
                                    <i class="fa-solid fa-rupiah-sign"></i>
                                    </div>
                                </td>
                                <td>
                                    <span style="display:block;">Category</span>
                                    <span style="display:block;">Amount and Tanggal</span>
                                </td>
                                <td><a href=class="btn btn-success btn-sm rounded-0" type="button"> <i class="fa fa-trash"></i></a></td>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Expense
                        </h5>
                        <p class="card-text">
                           
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>