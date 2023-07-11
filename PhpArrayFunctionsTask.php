<!DOCTYPE html>
<html>

<head>
  <title>PHP Function & Arrays Task</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #4f5b93;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #fff;
      margin-bottom: 20px;
    }

    .card {
      background-color: #b0b9e5;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-bottom: 10px;
    }

    pre {
      background-color: #231e34 !important;
      padding: 10px;
      border-radius: 5px;
      color: #fff;
    }

    code {
      font-family: Consolas, monospace;
    }

    .result {
      margin-top: 10px;
    }

    .result-label {
      font-weight: bold;
    }

    .result-value {
      color: #333;
    }

    .input-section {
      margin-bottom: 10px;
    }

    .input-section label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-section input {
      padding: 5px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .submit-button {
      display: block;
      padding: 8px 16px;
      border-radius: 5px;

      background: #515e9b;
      color: #fff;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }

    .submit-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <h1>PHP Functions & Arrays Assignment</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   error_reporting(0);

    if (isset($_POST['arguments'])) {
      $arguments = $_POST['arguments'];
      $args = explode(',', $arguments);

      //Q1
      // Write a PHP function that accepts an array of integers and return a new array after removing odd
      // numbers.
      function remove_odd_nums(...$nums)
      {
        $evenNums = [];

        foreach ($nums as $num) {
          if( is_numeric($num)!= 1)
          return array('wrong insert');
          if ($num % 2 === 0) {
            $evenNums[] = $num;
          }
        }

        return $evenNums;
      }

      $evenNums = remove_odd_nums(...$args);
    }

    if (isset($_POST['strings'])) {
      $stringsInput = $_POST['strings'];
      $strings = explode(',', $stringsInput);

      //Q2
      // Write a PHP function that accepts an array of strings and return the longest string found in the
      // array, the function should have a 2nd argument that will hold the index of the item that have the
      // longest string in the input array.
      function longestString($arr, &$var)
      {
        $str_len = 0;
        foreach ($arr as $k => $v) {
          if (strlen($v) > strlen($arr[$str_len])) {
            $str_len = $k;
          }
        }
        $var = $str_len;
        return $arr[$str_len];
      }

      $longest = '';
      $longestStringIndex = 0;

      if (!empty($strings)) {
        $longest = longestString($strings, $longestStringIndex);
      }
    }

    if (isset($_POST['arr1']) && isset($_POST['arr2'])) {
      $arr1Input = $_POST['arr1'];
      $arr2Input = $_POST['arr2'];
  
      $arr1 = explode(',', $arr1Input);
      $arr2 = explode(',', $arr2Input);
      

      //Q3
      //Write a function that accepts 2 arrays and return a new array that holds the value of
      // multiplying each item in the first array by the corresponding item in the second array.
      function multiAr($arr1, $arr2)
      {
        $newArray = [];
  
        for ($i = 0; $i < count($arr1); $i++) {
          $newArray[$i] = $arr1[$i] * $arr2[$i];
        }
  
        return $newArray;
      }
  
      function mutliArrays($arr1, $arr2)
      {
        $check = count($arr1) <=> count($arr2);
  
        if ($check == 1) {
          return multiAr($arr2, $arr1);
        } else {
          return multiAr($arr1, $arr2);
        }
      }
  
      $result = mutliArrays($arr1, $arr2);
    }

    if (isset($_POST['number'])) {
      //Q4
      // Write a function to calculate the factorial of a number (a non-negative integer). The function
      // accepts the number as an argument.
     function factorial_loop($n)
      {
        if ($n < 0) {
          return "Error";
        } elseif ($n == 0) {
          return 1;
        } else {
          $result = 1;
          for ($i = 1; $i <= $n; $i++) {
            $result *= $i;
          }
          return $result;
        }
      }
    }


    if (isset($_POST['numberRecursion'])) {
      //Q4
      // Write a function to calculate the factorial of a number (a non-negative integer). The function
      // accepts the number as an argument.
      function factorial_recursion($n)
      {
        if ($n < 0) {
          return "Error";
        } elseif ($n == 0) {
          return 1;
        } else {
          return $n * factorial_recursion($n - 1);
        }
      }
     }

     if (isset($_POST['numberPrime'])) {
      //Q5

        // Write a function to check whether a number is prime or not.

        function checkPrime($number)
          {
            if ($number <= 1) {
              return false;
            }

            for ($i = 2; $i <= sqrt($number); $i++) {
              if ($number % $i == 0) {
                return false;
              }
            }

            return true;
          }
        }

  }

  $odd_number_code='
  function removeOddNumbers($numbers)
  {
    $result = array();
  
    foreach ($numbers as $number) {
      if ($number % 2 == 0) {
        $result[] = $number;
      }
    }
  
    return $result;
  }
  ';

  $longest_code='
  function longestString($arr, &$var)
  {
    $str_len = 0;
    foreach ($arr as $k => $v) {
      if (strlen($v) > strlen($arr[$str_len])) {
        $str_len = $k;
      }
    }
    $var = $str_len;
    return $arr[$str_len];
  }
  ';

$mutiple_arrays_code='
function multiAr($arr1, $arr2)
{
  $newArray = [];

  for ($i = 0; $i < count($arr1); $i++) {
    $newArray[$i] = $arr1[$i] * $arr2[$i];
  }

  return $newArray;
}

function mutliArrays($arr1, $arr2)
{
  $check = count($arr1) <=> count($arr2);

  if ($check == 1) {
    return multiAr($arr2, $arr1);
  } else {
    return multiAr($arr1, $arr2);
  }
}
';

$factorial_loop_code='
function factorial_loop($n)
{
  if ($n < 0) {
    return "Error";
  } elseif ($n == 0) {
    return 1;
  } else {
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
      $result *= $i;
    }
    return $result;
  }
}
';
$factorial_recursion_code= '
function factorial_recursion($n)
{
  if ($n < 0) {
    return "Error";
  } elseif ($n == 0) {
    return 1;
  } else {
    return $n * factorial_recursion($n - 1);
  }
}
';

$prime_code= '
function checkPrime($number)
{
  if ($number <= 1) {
    return false;
  }

  for ($i = 2; $i <= sqrt($number); $i++) {
    if ($number % $i == 0) {
      return false;
    }
  }

  return true;
}
';

  ?>


  <div class="card">
    <h2>Remove Odd Numbers</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($odd_number_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="numbers">Numbers:</label>
        <input type="text" name="arguments" id="arguments" placeholder="Enter numbers separated by commas" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['arguments'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Input Numbers: </span>
          <span class="result-value"><?php echo implode(", ", $args); ?></span>
        </div>
        <div class="result">
          <span class="result-label">Even Numbers: </span>
          <span class="result-value"><?php echo implode(', ', $evenNums); ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="card">
    <h2>Longest String</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($longest_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="strings">Strings:</label>
        <input type="text" name="strings" id="strings" placeholder="Enter strings separated by commas">
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['strings'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Input Strings: </span>
          <span class="result-value"><?php echo implode(", ", $strings); ?></span>
        </div>
        <div class="result">
          <span class="result-label">Longest String: </span>
          <span class="result-value"><?php echo $longest; ?></span>
        </div>
        <div class="result">
          <span class="result-label">Longest String Index: </span>
          <span class="result-value"><?php echo $longestStringIndex; ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>


  <div class="card">
    <h2>Multiply Arrays</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($mutiple_arrays_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="arr1">Array 1:</label>
        <input type="text" name="arr1" id="arr1" placeholder="Enter values separated by commas" required>
      </div>
      <div class="input-section">
        <label for="arr2">Array 2:</label>
        <input type="text" name="arr2" id="arr2" placeholder="Enter values separated by commas" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['arr1']) && isset($_POST['arr2'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Array 1:</span>
          <span class="result-value"><?php echo implode(", ", $arr1); ?></span>
        </div>
        <div class="result">
          <span class="result-label">Array 2:</span>
          <span class="result-value"><?php echo implode(", ", $arr2); ?></span>
        </div>
        <div class="result">
          <span class="result-label">Result:</span>
          <span class="result-value"><?php echo implode(", ", $result); ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>


  <div class="card">
    <h2>Factorial By loop</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($factorial_loop_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="number">Number:</label>
        <input type="number" name="number" id="number" min="0" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Number:</span>
          <span class="result-value"><?php echo $_POST['number']; ?></span>
        </div>
        <div class="result">
          <span class="result-label">Factorial:</span>
          <span class="result-value"><?php echo factorial_loop($_POST['number']); ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>


  <div class="card">
    <h2>Factorial By recursion</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($factorial_recursion_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="numberRecursion">Number:</label>
        <input type="numberRecursion" name="numberRecursion" id="numberRecursion" min="0" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numberRecursion'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Number:</span>
          <span class="result-value"><?php echo $_POST['numberRecursion']; ?></span>
        </div>
        <div class="result">
          <span class="result-label">Factorial:</span>
          <span class="result-value"><?php echo factorial_recursion($_POST['numberRecursion']); ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>


  <div class="card">
    <h2>Prime Number Check</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php echo htmlentities($prime_code); ?></code></pre>
      </div>
      <div class="input-section">
        <label for="numberPrime">Number:</label>
        <input type="number" name="numberPrime" id="numberPrime" min="0" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numberPrime'])) : ?>
      <div class="result-section">
        <div class="result">
          <span class="result-label">Number:</span>
          <span class="result-value"><?php echo $_POST['numberPrime']; ?></span>
        </div>
        <div class="result">
          <span class="result-label">Is Prime:</span>
          <span class="result-value"><?php echo checkPrime($_POST['numberPrime']) ? 'Yes' : 'No'; ?></span>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
