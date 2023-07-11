<!DOCTYPE html>
<html>

<head>
  <title>PHP Functions & Arrays Assignment</title>
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
  <h1>PHP Basics Task</h1>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Q1
    ////Check if the first two characters and last two characters of a given string are the same:

    function checkFirstLastCharacters($string)
    {
      if (strlen($string) <= 3) {
        echo "string should be more than 2 letters";
        return 0;
      }

      $firstTwo = substr($string, 0, 2);
      $lastTwo = substr($string, -2);

      if ($firstTwo === $lastTwo)
        echo "The first two and last two characters of '$string' are the same.";
      else
        echo "The first two and last two characters of '$string' are not the same.";
    }


    //Q2
    //Check if a given string starts with 'Go' or not (without using "str_starts_with" function):

    function startsWithGo($string)
    {
      $prefix = "Go";
      $check = substr($string, 0, strlen($prefix)) === $prefix;

      if ($check)
        echo "The string '$string' starts with 'Go'.";
      else
        echo "The string '$string' does not start with 'Go'.";
    }

    //Q3
    // Check if a given positive number is a multiple of 3 or a multiple of 7:

    function isMultipleOfThreeOrSeven($number)
    {
      $check = $number > 0 && ($number % 3 == 0 || $number % 7 == 0);
      if ($check)
        echo "$number is a multiple of 3 or 7.";
      else
        echo "$number is not a multiple of 3 or 7.";
    }

    //Q4
    //Check the largest number among three given numbers:

    function findLargestNumber($num1, $num2, $num3)
    {
      $largest = max($num1, $num2, $num3);
      echo "The largest number among $num1, $num2, and $num3 is: $largest";
    }

    //Q5
    //Check which number is nearest to the value 100 among two given integers, returning 0 if they are equal:

    function findNearestTo100($num1, $num2)
    {
      if ($num1 == $num2) {
        $nearest = 0;
      }

      $diff1 = abs($num1 - 100);
      $diff2 = abs($num2 - 100);

      $nearest = ($diff1 < $diff2) ? $num1 : $num2;
      if ($nearest == 0)
        echo "They are the same";
      else
        echo "The number nearest to 100 between $num1 and $num2 is: $nearest";
    }

    //Q6
    // Find the larger value from two positive integer values that are in the range 20..30 inclusive, or return 0 if neither is in that range:

    function findLargerInRange($num1, $num2)
    {
      $range = range(20, 30);

      if (in_array($num1, $range) && in_array($num2, $range)) {
        return max($num1, $num2);
      } elseif (in_array($num1, $range)) {
        return $num1;
      } elseif (in_array($num2, $range)) {
        return $num2;
      } else {
        return 0;
      }
    }

    //Q7
    //Write a PHP program to count the number of occurrences of any digit in a string.

    function findNumOfNums($a)
    {
      $nums = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
      $num = 0;
      for ($i = strlen($a) - 1; $i >= 0; $i--) {
        if (in_array($a[$i], $nums)) {
          $num++;
        }
      }

      echo $num;
    }

    //Q8
    //Write a PHP program to return the sum of digits of a an integer number.

    function sumDigits($num)
    {
      $sum = 0;
      for ($i = strlen($num) - 1; $i >= 0; $i--) {
        $sum += $num[$i];
      }

      echo $sum;
    }

    //Q9
    //Write a PHP program to reverse any string. (Don't use "strrev" function)

    function stringReverse($a)
    {
      for ($i = strlen($a) - 1; $i >= 0; $i--) {
        echo $a[$i];
      }
    }
  }
  ?>


  <div class="card">
    <h2>Check First and Last Characters</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function checkFirstLastCharacters($string)
                            {
                              if (strlen($string) < 2) {
                                echo "string should be more than 2 letters";
                                return 0;
                              }

                              $firstTwo = substr($string, 0, 2);
                              $lastTwo = substr($string, -2);

                              if ($firstTwo === $lastTwo)
                                echo "The first two and last two characters of \'$string\' are the same.";
                              else
                                echo "The first two and last two characters of \'$string\' are not the same.";
                              return 1;
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="firstLastString">String:</label>
        <input type="text" name="firstLastString" id="firstLastString" placeholder="Enter a string" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstLastString'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input String: </span>
            <span class="answer-value"><?php echo $_POST['firstLastString']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php checkFirstLastCharacters($_POST['firstLastString']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Starts with "Go"</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function startsWithGo($string)
                            {
                              $prefix = "Go";
                              $check = substr($string, 0, strlen($prefix)) === $prefix;

                              if ($check)
                                echo "The string \'$string\' starts with \'Go\'.";
                              else
                                echo "The string \'$string\' does not start with \'Go\'.";
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="startsWithGoString">String:</label>
        <input type="text" name="startsWithGoString" id="startsWithGoString" placeholder="Enter a string" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['startsWithGoString'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input String: </span>
            <span class="answer-value"><?php echo $_POST['startsWithGoString']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php startsWithGo($_POST['startsWithGoString']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Is Multiple of 3 or 7</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function isMultipleOfThreeOrSeven($number)
                            {
                              $check = $number > 0 && ($number % 3 == 0 || $number % 7 == 0);
                              if ($check)
                                echo "$number is a multiple of 3 or 7.";
                              else
                                echo "$number is not a multiple of 3 or 7.";
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="multipleNumber">Number:</label>
        <input type="number" name="multipleNumber" id="multipleNumber" placeholder="Enter a number" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['multipleNumber'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input Number: </span>
            <span class="answer-value"><?php echo $_POST['multipleNumber']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php isMultipleOfThreeOrSeven($_POST['multipleNumber']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Find the Largest Number</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function findLargestNumber($num1, $num2, $num3)
                            {
                              $largest = max($num1, $num2, $num3);
                              echo "The largest number among $num1, $num2, and $num3 is: $largest";
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="largestNum1">Number 1:</label>
        <input type="number" name="largestNum1" id="largestNum1" placeholder="Enter number 1" required>
      </div>
      <div class="input-section">
        <label for="largestNum2">Number 2:</label>
        <input type="number" name="largestNum2" id="largestNum2" placeholder="Enter number 2" required>
      </div>
      <div class="input-section">
        <label for="largestNum3">Number 3:</label>
        <input type="number" name="largestNum3" id="largestNum3" placeholder="Enter number 3" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['largestNum1'], $_POST['largestNum2'], $_POST['largestNum3'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input Numbers: </span>
            <span class="answer-value"><?php echo $_POST['largestNum1']; ?>, <?php echo $_POST['largestNum2']; ?>, <?php echo $_POST['largestNum3']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php findLargestNumber($_POST['largestNum1'], $_POST['largestNum2'], $_POST['largestNum3']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Find the Number Nearest to 100</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function findNearestTo100($num1, $num2)
                            {
                              if ($num1 == $num2) {
                                $nearest = 0;
                              }

                              $diff1 = abs($num1 - 100);
                              $diff2 = abs($num2 - 100);

                              $nearest = ($diff1 < $diff2) ? $num1 : $num2;
                              if ($nearest == 0)
                                echo "They are the same";
                              else
                                echo "The number nearest to 100 between $num1 and $num2 is: $nearest";
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="nearestNum1">Number 1:</label>
        <input type="number" name="nearestNum1" id="nearestNum1" placeholder="Enter number 1" required>
      </div>
      <div class="input-section">
        <label for="nearestNum2">Number 2:</label>
        <input type="number" name="nearestNum2" id="nearestNum2" placeholder="Enter number 2" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nearestNum1'], $_POST['nearestNum2'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input Numbers: </span>
            <span class="answer-value"><?php echo $_POST['nearestNum1']; ?>, <?php echo $_POST['nearestNum2']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php findNearestTo100($_POST['nearestNum1'], $_POST['nearestNum2']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Find the Larger Number in Range</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function findLargerInRange($num1, $num2)
                            {
                              $range = range(20, 30);

                              if (in_array($num1, $range) && in_array($num2, $range)) {
                                return max($num1, $num2);
                              } elseif (in_array($num1, $range)) {
                                return $num1;
                              } elseif (in_array($num2, $range)) {
                                return $num2;
                              } else {
                                return 0;
                              }
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="rangeNum1">Number 1:</label>
        <input type="number" name="rangeNum1" id="rangeNum1" placeholder="Enter number 1" required>
      </div>
      <div class="input-section">
        <label for="rangeNum2">Number 2:</label>
        <input type="number" name="rangeNum2" id="rangeNum2" placeholder="Enter number 2" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rangeNum1'], $_POST['rangeNum2'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input Numbers: </span>
            <span class="answer-value"><?php echo $_POST['rangeNum1']; ?>, <?php echo $_POST['rangeNum2']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php echo findLargerInRange($_POST['rangeNum1'], $_POST['rangeNum2']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Count Occurrences of Digits in a String</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function findNumOfNums($a)
                            {
                              $nums = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
                              $num = 0;
                              for ($i = strlen($a) - 1; $i >= 0; $i--) {
                                if (in_array($a[$i], $nums)) {
                                  $num++;
                                }
                              }

                              echo $num;
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="numString">String:</label>
        <input type="text" name="numString" id="numString" placeholder="Enter a string" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numString'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input String: </span>
            <span class="answer-value"><?php echo $_POST['numString']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php findNumOfNums($_POST['numString']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Sum of Digits</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function sumDigits($num)
                            {
                              $sum = 0;
                              for ($i = strlen($num) - 1; $i >= 0; $i--) {
                                $sum += $num[$i];
                              }

                              echo $sum;
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="sumNum">Number:</label>
        <input type="number" name="sumNum" id="sumNum" placeholder="Enter a number" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sumNum'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input Number: </span>
            <span class="answer-value"><?php echo $_POST['sumNum']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php sumDigits($_POST['sumNum']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>

  <div class="card">
    <h2>Reverse String</h2>
    <form method="POST">
      <div class="code-block">
        <pre><code><?php
                    $code = '
                            function stringReverse($a)
                            {
                              for ($i = strlen($a) - 1; $i >= 0; $i--) {
                                echo $a[$i];
                              }
                            }
                            ';
                    echo htmlentities($code);
                    ?></code></pre>
      </div>
      <div class="input-section">
        <label for="reverseString">String:</label>
        <input type="text" name="reverseString" id="reverseString" placeholder="Enter a string" required>
      </div>
      <button class="submit-button" type="submit">Submit</button>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reverseString'])) : ?>
        <div class="answer-section">
          <div class="answer">
            <span class="answer-label">Input String: </span>
            <span class="answer-value"><?php echo $_POST['reverseString']; ?></span>
          </div>
          <div class="answer">
            <span class="answer-value"><?php stringReverse($_POST['reverseString']); ?></span>
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>
</body>

</html>