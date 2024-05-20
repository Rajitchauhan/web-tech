<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        function showAdditionalOptions() {
            var selectedOption = document.getElementById('filterOption').value;
            var inputBox = document.getElementById('inputBox');
            var serialOptions = document.getElementById('serialOptions');
            var durationOptions = document.getElementById('durationOptions');
            var dateRangeOption = document.getElementById('dateRangeOption');

            inputBox.style.display = 'none';
            serialOptions.style.display = 'none';
            durationOptions.style.display = 'none';
            dateRangeOption.style.display = 'none';

            switch (selectedOption) {
                case 'Serial':
                    serialOptions.style.display = 'block';
                    break;
                case 'Duration':
                    durationOptions.style.display = 'block';
                    break;
                case 'CertificateCompletion':
                    dateRangeOption.style.display = 'block';
                    break;
                default:
                    inputBox.style.display = 'block';
                    break;
            }
        }

        function setSerialPrefix() {
            var prefixSelect = document.getElementById('serialSelect');
            var userInput = document.getElementById('userInput');
            var selectedOption = prefixSelect.value;

            switch (selectedOption) {
                case 'Normal':
                    userInput.value = 'EGA';
                    break;
                case 'Project':
                    userInput.value = 'EGAP';
                    break;
                default:
                    userInput.value = '';
                    break;
            }
        }
    </script>
</head>
<body>

<div class="container mt-5">
    <h2>Filter Data</h2>

    <form method="post" action="filter_data.php">
        <div class="mb-3">
            <label for="filterOption" class="form-label">Select Filter Option:</label>
            <select class="form-select" id="filterOption" name="filterOption" onchange="showAdditionalOptions()">
                <option value="SName">Student Name</option>
                <option value="Duration">Duration</option>
                <option value="Serial">Serial No</option>
                <option value="CertificateCompletion">Certificate Completion</option>
                <option value="Course">Course</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <!-- Serial Number Options -->
        <div id="serialOptions" style="display: none;">
            <label for="serialSelect" class="form-label">Select Option:</label>
            <select class="form-select" id="serialSelect" onchange="setSerialPrefix()">
                <option value="Normal">Normal</option>
                <option value="Project">Project</option>
            </select>
        </div>

        <!-- Input Box -->
        <div id="inputBox" style="display: block;">
            <label for="userInput" class="form-label">Enter Value:</label>
            <input type="text" class="form-control" id="userInput" name="userInput" placeholder="Default Input">
        </div>

        <!-- Duration Options -->
        <div id="durationOptions" style="display: none;">
            <label class="form-label">Select or Enter Duration:</label>
            <div class="input-group">
                <select class="form-select" id="durationUnit" name="durationUnit">
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                </select>
                <input type="text" class="form-control" id="durationInput" name="durationInput" placeholder="Enter Duration">
            </div>
        </div>

        <!-- Certificate Completion Options -->
        <div id="dateRangeOption" style="display: none;">
            <label for="startDate" class="form-label">Start Date:</label>
            <input type="date" class="form-control" id="startDate" name="startDate">
            <label for="endDate" class="form-label">End Date:</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>

        <button type="submit" class="btn btn-primary">Filter Data</button>
    </form>

    <!-- Display filtered data here -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
