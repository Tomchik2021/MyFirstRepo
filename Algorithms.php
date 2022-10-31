<?
/*
 * Function to find nth number in Fibonacci sequence.
 * Uses a version of memoization and runs very fast!
 */

/**
 * @param int $n position to check
 * @param array $m array to store solved trees
 */
function fibonacciPosition(int $n, array &$m = [])
{
    if(isset($m[$n])) return $m[$n];
    if($n < 2) return $n;

    $m[$n] = fibonacciPosition($n - 1, $m) + fibonacciPosition($n - 2, $m);

    return $m[$n];

}

print fibonacciPosition(59);
echo"<hr>";
/**
 * Binary search algorithm iterative approach
 *
 * Be careful collection must be ascending sorted, otherwise result will be unpredictable
 *
 * Examples:
 * binarySearchIterative([0, 5, 7, 10, 15], 0);
 * 0
 * binarySearchIterative([0, 5, 7, 10, 15], 15);
 * 4
 * binarySearchIterative([0, 5, 7, 10, 15], 5);
 * 1
 * binarySearchIterative([0, 5, 7, 10, 15], 6);
 *
 *array $list
 *int $target
 *  int
 */
function binarySearchIterative($list, $target)
{
    $first = 0;
    $last = count($list)-1;


    while ($first <= $last) {
        $mid = ($first + $last) >> 1;


        if ($list[$mid] == $target) {
            return $mid;
        } elseif ($list[$mid] > $target) {
            $last = $mid - 1;
        } elseif ($list[$mid] < $target) {
            $first = $mid + 1;
        }
    }

    return null;
}echo binarySearchIterative([0, 5, 7, 10, 15], 15);
echo"<hr>";
/**
 * Binary search algorithm in PHP by recursion
 *
 * Be careful collection must be ascending sorted, otherwise result will be unpredictable
 *
 * Examples:
 * binarySearchByRecursion([0, 5, 7, 10, 15], 0, 0, 4);
 * 0
 * binarySearchByRecursion([0, 5, 7, 10, 15], 15, 0, 4);
 * 4
 * binarySearchByRecursion([0, 5, 7, 10, 15], 5, 0, 4);
 * 1
 * binarySearchByRecursion([0, 5, 7, 10, 15], 6, 0, 4);
 *
 *  Array $list a sorted array list of integers to search
 *  integer $target an integer number to search for in the list
 *  integer $start an integer number where to start searching in the list
 *  integer $end an integer number where to end searching in the list
 * integer the index where the target is found (or null if not found)
 */
function binarySearchByRecursion($list, $target, $start, $end)
{
    if (count($list) == 0) {
        return null;
    }

    if (count($list) < 2) {
        return $list[0] == $target ? 0 : null;
    }

    if ($start > $end)
        return null;


    $mid = ($start + $end) >> 1;


    if ($list[$mid] == $target) {
        return $mid;
    } elseif ($list[$mid] > $target) {
        return binarySearchByRecursion($list, $target, $start, $mid-1);
    } elseif ($list[$mid] < $target) {
        return binarySearchByRecursion($list, $target, $mid+1, $end);
    }

    return null;
}
print_r(binarySearchByRecursion([0, 5, 7, 10, 15], 6, 0, 4));
echo"<hr>";
/**
   * Jump Search algorithm in PHP
   * References: https://www.geeksforgeeks.org/jump-search/
   * The list must be sorted in ascending order before performing jumpSearch
   *
   *  Array $list refers to a sorted list of integer
   *  integer $key refers to the integer target to be searched from the sorted list
   * index of $key if found, otherwise -1 is returned
 */

function jumpSearch($list,$key)
{
	/*number of elements in the sorted array*/
	$num = count($list);
	/*block size to be jumped*/
	$step = (int)sqrt($num);
	$prev = 0;

	while ($list[min($step, $num)-1] < $key)
	{
		$prev = $step;
		$step += (int)sqrt($num);
		if ($prev >= $num)
			return -1;
	}

	/*Performing linear search for $key in block*/
	while ($list[$prev] < $key)
	{
		$prev++;
		if ($prev == min($step, $num))
			return -1;
	}

     return $list[$prev] === $key ? $prev : -1;
}
echo"<hr>";
/*Examples:
 *  data =  5, 7, 8, 11, 12, 15, 17, 18, 20
 *  x = 15
 *  Element found at position 6
 *
 *  x = 1
 *  Element not found
 *
 *  Array $list a array of integers to search
 *   integer $target an integer number to search for in the list
 *  integer the index where the target is found (or -1 if not found)
 */
function linearSearch($list, $target)
{
    $n = sizeof($list);
    for($i = 0; $i < $n; $i++)
    {
        if($list[$i] == $target) {
            return $i + 1;
        }
    }

    return -1;
}
?>