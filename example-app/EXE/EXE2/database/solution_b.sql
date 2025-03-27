-- 10. Liệt kê hóa đơn của khách hàng: mã user, tên user, mã hóa đơn
SELECT u.user_id, u.user_name, o.order_id
FROM users u
JOIN orders o ON u.user_id = o.user_id;

-- 11. Liệt kê số lượng hóa đơn của khách hàng: mã user, tên user, số đơn hàng
SELECT u.user_id, u.user_name, COUNT(o.order_id) as order_count
FROM users u
LEFT JOIN orders o ON u.user_id = o.user_id
GROUP BY u.user_id, u.user_name;

-- 12. Liệt kê thông tin hóa đơn: mã đơn hàng, số sản phẩm
SELECT o.order_id, COUNT(od.product_id) as product_count
FROM orders o
JOIN order_details od ON o.order_id = od.order_id
GROUP BY o.order_id;

-- 13. Liệt kê thông tin mua hàng: mã user, tên user, mã đơn hàng, tên sản phẩm
SELECT u.user_id, u.user_name, o.order_id, p.product_name
FROM users u
JOIN orders o ON u.user_id = o.user_id
JOIN order_details od ON o.order_id = od.order_id
JOIN products p ON od.product_id = p.product_id
ORDER BY o.order_id;

-- 14. Liệt kê 7 người dùng mua sản phẩm có tên 'Samsung' hoặc 'Apple'
SELECT u.user_id, u.user_name, o.order_id, p.product_name
FROM users u
JOIN orders o ON u.user_id = o.user_id
JOIN order_details od ON o.order_id = od.order_id
JOIN products p ON od.product_id = p.product_id
WHERE p.product_name LIKE '%Samsung%' OR p.product_name LIKE '%Apple%'
LIMIT 7;

-- 15. Liệt kê danh sách mua hàng: mã user, tên user, mã đơn hàng, tổng tiền
SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) as total_price
FROM users u
JOIN orders o ON u.user_id = o.user_id
JOIN order_details od ON o.order_id = od.order_id
JOIN products p ON od.product_id = p.product_id
GROUP BY u.user_id, u.user_name, o.order_id;

-- 16. Liệt kê đơn hàng có tổng tiền nhỏ nhất của mỗi user
WITH RankedOrders AS (
    SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) as total_price, COUNT(od.product_id) as product_count,
           ROW_NUMBER() OVER (PARTITION BY u.user_id ORDER BY SUM(p.product_price) ASC) as rn
    FROM users u
    JOIN orders o ON u.user_id = o.user_id
    JOIN order_details od ON o.order_id = od.order_id
    JOIN products p ON od.product_id = p.product_id
    GROUP BY u.user_id, u.user_name, o.order_id
)
SELECT user_id, user_name, order_id, total_price, product_count
FROM RankedOrders
WHERE rn = 1;

-- 17. Liệt kê đơn hàng có số sản phẩm nhiều nhất của mỗi user
WITH RankedOrders AS (
    SELECT u.user_id, u.user_name, o.order_id, SUM(p.product_price) as total_price, COUNT(od.product_id) as product_count,
           ROW_NUMBER() OVER (PARTITION BY u.user_id ORDER BY COUNT(od.product_id) DESC) as rn
    FROM users u
    JOIN orders o ON u.user_id = o.user_id
    JOIN order_details od ON o.order_id = od.order_id
    JOIN products p ON od.product_id = p.product_id
    GROUP BY u.user_id, u.user_name, o.order_id
)
SELECT user_id, user_name, order_id, total_price, product_count
FROM RankedOrders
WHERE rn = 1;