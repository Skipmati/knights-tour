<?php
class Knight
{
    static $N = 5;
    static function isSafe($x, $y, &$sol)
    {
        return ($x >= 0 && $x < self::$N && $y >= 0 && $y < self::$N && $sol[$x][$y] == -1);
    }
    static function printSolution(&$sol)
    {
        for ($x = 0; $x < self::$N; $x++)
        {
            for ($y = 0; $y < self::$N; $y++)
            {
                echo strval($sol[$x][$y]) . " ";
            }
            print("<br>");
        }
    }
    static function solveKT()
    {
        for ($x = 0; $x < self::$N; $x++)
        {
            for ($y = 0; $y < self::$N; $y++)
            {
                $sol[$x][$y] = -1;
            }
        }
        $xMove = array(
            2, 1, -1, -2, -2, -1, 1, 2
        );
        $yMove = array(
            1, 2, 2, 1, -1, -2, -2, -1
        );
        $sol[0][0] = 0;
        if (self::solveKTUtil(0, 0, 1, $sol, $xMove, $yMove))
        {
            self::printSolution($sol);
        }
        return true;
    }
    static function solveKTUtil($x, $y, $movei, &$sol, &$xMove, &$yMove)
    {
        $k;
        $next_x;
        $next_y;
        if ($movei == self::$N * self::$N)
        {
            return true;
        }
        for ($k = 0; $k < 8; $k++)
        {
            $next_x = $x + $xMove[$k];
            $next_y = $y + $yMove[$k];
            if (self::isSafe($next_x, $next_y, $sol))
            {
                $sol[$next_x][$next_y] = $movei;
                if (self::solveKTUtil($next_x, $next_y, $movei + 1, $sol, $xMove, $yMove))
                {
                    return true;
                }
                else
                {
                    $sol[$next_x][$next_y] = -1;
                }
            }
        }
        return false;
    }
    public static function main()
    {
        self::solveKT();
    }
}
Knight::main();
?>
