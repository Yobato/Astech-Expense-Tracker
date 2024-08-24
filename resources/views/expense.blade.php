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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">
                            Monefy
                        </h5>
                        <h6 class="card-subtitle text-muted mb-4" style="text-align: center">
                            Track your income and expense
                        </h6>
                        <p class="card-text" style="text-align: center">Total Balance <br></p>
                        <h4 id="balance" style="text-align: center">Rp {{ number_format($remainingAmount, 0, ',','.')}}</h4>
                        <hr class="solid" style="border-top: 0.5 px solid #bbb;">
                        <form class="mb-4" action="{{route('storeExpense')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Type:</label>
                                        <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                            <option id="income-type" value="income">Income</option>
                                            <option id="expense-type" value="expense">Expense</option>
                                        </select>
                                        @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                                            <option value="" selected>Category</option>
                                        </select>
                                        @error('category')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="amount">Amount:</label>
                                        <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount">
                                        @error('amount')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date">Date:</label>
                                        <input type="date" class="form-control @error('amount') is-invalid @enderror" id="date" name="date" value="{{ date('Y-m-d') }}">
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Create</button>
                        </form>
                        <div class="table-responsive" style="max-height: 200px; overflow-y: scroll;">
                            <table class="table w-100">
                                <tbody>
                                    @foreach($expense as $admins)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="text-white type-indicator" data-type="{{ $admins->type}}" style="border-radius: 50%; display:inline-block; background-color: #4caf50; padding: 25% 35%;">
                                            <i class="fa-solid fa-rupiah-sign"></i>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <span style="display:block;">{{ $admins ->category}}</span>
                                            <span style="display:block; color: #778899"> <span class="currency-field">{{ $admins ->amount}}</span> -  {{ \Carbon\Carbon::parse($admins->date)->format('d-m-Y')}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-danger btn-sm" type="button" href="{{ route('deleteExpense', [$admins->id]) }}" value="Delete"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Income
                            </h5>
                            <p id="balance-incomes">Rp {{ number_format($totalIncomesChart, 0, ',','.')}}</p>
                            <canvas id="incomeChart"></canvas>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Expense
                            </h5>
                            <p id="balance-expenses">Rp {{ number_format($totalExpensesChart, 0, ',','.')}}</p>
                            <canvas id="expenseChart"></canvas>
                            <p class="card-text">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>

    // ============== Data Category ================
    
    let incomeCategories = [
        { value: 'Business', text: 'Business' },
        { value: 'Investment', text: 'Investment' },
        { value: 'Extra Income', text: 'Extra income' },
        { value: 'Deposits', text: 'Deposits' },
        { value: 'Lottery', text: 'Lottery' },
        { value: 'Gifts', text: 'Gifts' },
        { value: 'Salary', text: 'Salary' },
        { value: 'Savings', text: 'Savings' },
        { value: 'Rental Income', text: 'Rental Income' }
    ];

    let expenseCategories = [
        { value: 'Bills', text: 'Bills' },
        { value: 'Car', text: 'Car' },
        { value: 'Clothes', text: 'Clothes' },
        { value: 'Travel', text: 'Travel' },
        { value: 'Food', text: 'Food' },
        { value: 'Shopping', text: 'Shopping' },
        { value: 'House', text: 'House' },
        { value: 'Entertainment', text: 'Entertainment' },
        { value: 'Phone', text: 'Phone' },
        { value: 'Pets', text: 'Pets' },
        { value: 'Other', text: 'Other' }
    ];
    
    document.addEventListener('DOMContentLoaded', function () {
        formatCurrencyOnLoad();
        updateIconColors();

       // ============== Dependent Dropdown Kategori Berdasarkan Type ================

        const typeSelect = document.getElementById('type');
        const categorySelect = document.getElementById('category');

        typeSelect.addEventListener('change', function(){
            let selectedType = typeSelect.value;
            let options;

            if (selectedType === 'income'){
                options = incomeCategories;
            } else if (selectedType === 'expense'){
                options = expenseCategories;
            }

            categorySelect.innerHTML = '<option value="" disabled selected>Category</option>';

            options.forEach(option => {
                const newOption = document.createElement('option');
                newOption.value = option.value;
                newOption.textContent = option.text;
                categorySelect.appendChild(newOption);
            });
            
        });

        typeSelect.dispatchEvent(new Event('change'));


       // ============== Membuat Doughnut Chart Income dan Expense ================

        let incomeData = @json($incomes);
        let expenseData = @json($expenses);

        // Data Income
        let incomeLabels = incomeData.map(item => item.category);
        let incomeTotals = incomeData.map(item => item.total);

        // Data Expense
        let expenseLabels = expenseData.map(item => item.category);
        let expenseTotals = expenseData.map(item => item.total);

        // ChartJS
        new Chart(document.getElementById('incomeChart'), {
            type: 'doughnut',
            data: {
                labels: incomeLabels,
                datasets: [{
                    label: 'Income',
                    data: incomeTotals,
                    backgroundColor: [
                        'rgb(146, 191, 57)',
                        'rgb(134, 151, 0)',
                        'rgb(65, 131, 0)',
                        'rgb(39, 110, 0)',
                        'rgb(21, 101, 0)',
                        'rgb(1, 88, 0)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

        new Chart(document.getElementById('expenseChart'), {
            type: 'doughnut',
            data: {
                labels: expenseLabels,
                datasets: [{
                    label: 'expense',
                    data: expenseTotals,
                    backgroundColor: [
                        'rgb(255, 159, 142)',
                        'rgb(235, 128, 73)',
                        'rgb(217, 99, 79)',
                        'rgb(232, 53, 49)',
                        'rgb(163, 32, 35)',
                        'rgb(151, 19, 24)'
                    ],
                    hoverOffset: 4
                }]
            }
        });

    });


    // ============== Membuat Format Currency Untuk Tampilan Balance ================

    function formatCurrencyOnLoad() {
        let currencyElements = document.getElementsByClassName('currency-field');

        for (let i = 0; i < currencyElements.length; i++) {
            let rawValue = currencyElements[i].textContent.replace(/[^\d]/g, '');

            if (rawValue) {
                let formattedValue = 'Rp ' + Number(rawValue).toLocaleString('id-ID');
                currencyElements[i].textContent = formattedValue;
            }
        }
    }

    // ============== Mengubah Warna Icon Tergantung Pada Expense atau Icnome ================

    function updateIconColors(){
        let indicators = document.querySelectorAll('.type-indicator');
        indicators.forEach(indicator => {
            let type = indicator.getAttribute('data-type');
            if(type === 'expense'){
                indicator.style.backgroundColor = '#dc3545';
            } else if (type === 'income'){
                indicator.style.backgroundColor = '#4caf50';
            }
        });
    }
    </script>
</body>
</html>