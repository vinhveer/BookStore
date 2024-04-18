---index---
SELECT TOP 3
    ua.username,
    oo.order_date_on,
    oo.status_on
FROM
    user_accounts ua
INNER JOIN
    user_roles ur ON ua.user_role_id = ur.user_role_id
INNER JOIN 
    customers c ON ur.user_id = c.user_id 
INNER JOIN 
    orders_online oo ON c.customer_id = oo.customer_id
ORDER BY
    oo.order_date_on DESC;
--------------------------
SELECT COUNT(*)
FROM orders_online
WHERE status_on = 'Complete';
--------------------------
SELECT COUNT(*)
FROM orders_online;
-------------------------- 
SELECT COUNT(*)
FROM orders_online
WHERE status_on = 'Pending';
--------------------------
SELECT SUM(total_amount_on)
FROM orders_online
WHERE status_on = 'Complete';
---index1---
SELECT ol.order_id, first_name, ol.status_on, ol.order_date_on
FROM orders_online ol
INNER JOIN customers c ON ol.customer_id = c.customer_id
INNER JOIN users us ON c.customer_id = us.user_id
---index2---
SELECT ol.order_id, first_name, po.amount, po.payment_date
FROM orders_online ol
INNER JOIN customers c ON ol.customer_id = c.customer_id
INNER JOIN users us ON c.customer_id = us.user_id
INNER JOIN payments_on po ON ol.order_id = po.order_id
---index3--- 
SELECT ol.order_id, sp.shipper_name, sp.delivery_status, sp.delivery_date
FROM orders_online ol
INNER JOIN shipper sp ON ol.order_id = sp.order_id
---index4--- 
SELECT CONVERT(date, order_date_on), SUM(total_amount_on)
FROM orders_online
GROUP BY CONVERT(date, order_date_on)
ORDER BY CONVERT(date, order_date_on) DESC
---orders--- 
CREATE FUNCTION GetOrderDetails(@order_id BIGINT)
RETURNS TABLE
AS
RETURN
(
    SELECT 
    CASE 
        WHEN od.product_id = b.product_id THEN b.book_name 
        ELSE op.others_product_name 
    END AS product_name,
    p.product_image, 
    p.product_price, 
    od.quantity, 
    od.discount, 
   (od.quantity * p.product_price * (1 - od.discount / 100)) AS total_price
FROM 
    order_details_on od
JOIN 
    products p ON od.product_id = p.product_id
LEFT JOIN 
    books b ON p.category_id = b.product_id AND b.product_id = p.product_id
LEFT JOIN 
    others_products op ON p.category_id != b.product_id AND op.product_id = p.product_id
WHERE 
    od.order_id = @order_id
);
CREATE FUNCTION dbo.GetTotalAmountForOrder (@order_id BIGINT)
RETURNS DECIMAL(10, 3)
AS
BEGIN
    DECLARE @total_amount DECIMAL(10, 3);
    SELECT @total_amount = total_amount_on
    FROM orders_online
    WHERE order_id = @order_id;
    RETURN @total_amount;
END;
CREATE FUNCTION GetCustomerInfoForOrder (@order_id BIGINT)
RETURNS TABLE
AS
RETURN
(
    SELECT 
        u.first_name, 
        u.user_id, 
        u.phone, 
        u.address
    FROM 
        users u
    INNER JOIN 
        customers c ON u.user_id = c.user_id
    INNER JOIN 
        orders_online oo ON c.customer_id = oo.customer_id
    WHERE 
        oo.order_id = @order_id
);
---paid order--- 
CREATE FUNCTION GetOrderDetails(@order_id BIGINT)
RETURNS TABLE
AS
RETURN
(
    SELECT 
    CASE 
        WHEN od.product_id = b.product_id THEN b.book_name 
        ELSE op.others_product_name 
    END AS product_name,
    p.product_image, 
    p.product_price, 
    od.quantity, 
    od.discount, 
   (od.quantity * p.product_price * (1 - od.discount / 100)) AS total_price
FROM 
    order_details_on od
JOIN 
    products p ON od.product_id = p.product_id
LEFT JOIN 
    books b ON p.category_id = b.product_id AND b.product_id = p.product_id
LEFT JOIN 
    others_products op ON p.category_id != b.product_id AND op.product_id = p.product_id
WHERE 
    od.order_id = @order_id
);
CREATE FUNCTION dbo.GetTotalAmountForOrder (@order_id BIGINT)
RETURNS DECIMAL(10, 3)
AS
BEGIN
    DECLARE @total_amount DECIMAL(10, 3);
    SELECT @total_amount = total_amount_on
    FROM orders_online
    WHERE order_id = @order_id;
    RETURN @total_amount;
END;
---total sales--- 
CREATE FUNCTION GetDetailDay(@order_date_on DATE)
RETURNS TABLE
AS
RETURN(
   SELECT ol.order_id, ol.total_amount_on
   FROM orders_online ol
   WHERE ol.order_date_on = @order_date_on
)
    SELECT total_amount_on
    FROM orders_online
    WHERE order_id = @order_id;
END;
---transport---
CREATE FUNCTION GetDetailTransport(@order_id BIGINT)
RETURNS TABLE
AS
RETURN(
   SELECT s.shipper_name, s.shipper_id, s.phone
   FROM shipper s
   WHERE s.order_id = @order_id
)




