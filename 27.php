<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Selection Box</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h2>Dynamic Selection Box</h2>

        <div class="mb-3">
            <label for="firstSelection" class="form-label">Select Option:</label>
            <select class="form-select" id="firstSelection" name="firstSelection" onchange="loadSecondSelection()">
                <option value="SName">Student Name</option>
                <option value="Duration">Duration</option>
                <option value="Serial">Serial No</option>
                <option value="CertificateCompletion">Certificate Completion</option>
                <option value="Course">Course</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="mb-3" id="secondSelectionContainer" style="display: none;">
            <label for="secondSelection" class="form-label">Select Course:</label>
            <select class="form-select" id="secondSelection" name="secondSelection"></select>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        function loadSecondSelection() {
            var firstSelection = document.getElementById('firstSelection');
            var selectedOption = firstSelection.value;

            // Clear the existing options in the second selection box
            var secondSelection = document.getElementById('secondSelection');
            secondSelection.innerHTML = "";

            // Load options based on the selected value from the database using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var courses = JSON.parse(xhr.responseText);
                    loadOptions(secondSelection, courses);
                }
            };

            xhr.open('GET', 'getData.php?selectedOption=' + selectedOption, true);
            xhr.send();

            // Display the second selection box when "Course" is selected
            var secondSelectionContainer = document.getElementById('secondSelectionContainer');
            secondSelectionContainer.style.display = (selectedOption === 'Course') ? 'block' : 'none';
        }

        function loadOptions(selectionBox, data) {
            for (var i = 0; i < data.length; i++) {
                var option = document.createElement('option');
                option.value = data[i];
                option.text = data[i];
                selectionBox.add(option);
            }
        }
    </script>

</body>

</html>
