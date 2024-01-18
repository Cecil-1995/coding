func searchMatrix(matrix [][]int, target int) bool {
    m := len(matrix);
    if m == 0 {
        return false;
    }
    n := len(matrix[0])
    if n == 0 {
        return false;
    }

    x, y := 0, n - 1;
    for x < m && y >= 0 {
        if matrix[x][y] == target {
            return true;
        }
        if matrix[x][y] > target {
            y--;
        } else {
            x++;
        }
    }

    return false;
}