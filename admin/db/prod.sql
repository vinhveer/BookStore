CREATE PROCEDURE GetUserInformation_no
@startFrom INT
AS
BEGIN
    SET NOCOUNT ON;

    DECLARE @pageSize INT = 8; -- Số lượng bản ghi trên mỗi trang
    DECLARE @startRow INT = (@startFrom - 1) * @pageSize; -- Số lượng dòng bắt đầu được bỏ qua

    SELECT
        case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
    INNER JOIN
        user_accounts ua ON ur.user_role_id = ua.user_role_id
    ORDER BY
        u.user_id
    OFFSET @startRow ROWS
    FETCH NEXT @pageSize ROWS ONLY;
END;


-- Tìm kiếm:
CREATE PROCEDURE SearchUsers
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%';
END;

-- search- em:
CREATE PROCEDURE [dbo].[SearchAccount_employee]
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		ua.password,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		r.role_id=3 and
		(lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%');
END;
-- search ad
CREATE PROCEDURE SearchAccount_admin
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		ua.password,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		r.role_id=2 and
		(lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%');
END;
--  search cus
CREATE PROCEDURE SearchAccount_customer
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		ua.password,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		r.role_id=1 and
		(lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%');
END;
-- search ware:
CREATE PROCEDURE SearchAccount_warehouse
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		ua.password,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		r.role_id=4 and
		(lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%');
END;
-- search ma:
CREATE PROCEDURE SearchAccount_manager
    @keyword NVARCHAR(200)
AS
BEGIN
    SELECT
		case
			when LEN(u.middle_name)> 0 then
				 CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)
			else CONCAT(u.last_name,' ', u.first_name)
		end AS full_name,
        u.email,
        r.role_name,
		r.role_id,
		ua.username,
		ua.password,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
    WHERE
		r.role_id=5 and
		(lower(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name)) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(r.role_name) LIKE '%' + lower(trim(@keyword))  + '%'
		OR LOWER(u.email) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI) LIKE '%' + lower(trim(@keyword)) + '%'
		OR LOWER(REPLACE(CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) COLLATE Vietnamese_CI_AI,' ','')) LIKE '%' + lower(replace(@keyword,' ','')) + '%');
END;

-- Insert
CREATE PROCEDURE [dbo].[InsertNewUser]
    @first_name NVARCHAR(15),
    @middle_name NVARCHAR(250),
    @last_name NVARCHAR(40),
    @date_of_birth DATE,
    @gender BIT,
    @email VARCHAR(255),
    @address NVARCHAR(255),
    @phone VARCHAR(15),
    @image_user NVARCHAR(MAX),
    @username VARCHAR(255),
    @password VARCHAR(255)
AS
BEGIN
    DECLARE @user_id BIGINT;

    -- Thêm người dùng vào bảng users
    INSERT INTO users (first_name, middle_name, last_name, date_of_birth, gender, address, phone, email, image_user)
    VALUES (@first_name, @middle_name, @last_name, @date_of_birth, @gender, @address, @phone, @email, @image_user);

    -- Lấy ID của người dùng vừa được thêm
    SET @user_id = SCOPE_IDENTITY();

    -- Thêm quyền cho người dùng vào bảng user_roles
    INSERT INTO user_roles (user_id, role_id)
    VALUES (@user_id, 1);

    DECLARE @user_role_id BIGINT;

    -- Lấy ID của quyền người dùng vừa được thêm
    SET @user_role_id = SCOPE_IDENTITY();

    -- Thêm tài khoản người dùng vào bảng user_accounts
    INSERT INTO user_accounts (username, password, user_role_id)
    VALUES (@username, @password, @user_role_id);
END;


CREATE PROCEDURE [dbo].[InsertNewUser_admin]
    @first_name NVARCHAR(15),
    @middle_name NVARCHAR(250),
    @last_name NVARCHAR(40),
    @date_of_birth DATE,
    @gender BIT,
    @email VARCHAR(255),
    @address NVARCHAR(255),
    @phone VARCHAR(15),
    @image_user NVARCHAR(MAX),
    @username VARCHAR(255),
    @password VARCHAR(255)
AS
BEGIN
    DECLARE @user_id BIGINT;

    -- Thêm người dùng vào bảng users
    INSERT INTO users (first_name, middle_name, last_name, date_of_birth, gender, address, phone, email, image_user)
    VALUES (@first_name, @middle_name, @last_name, @date_of_birth, @gender, @address, @phone, @email, @image_user);

    -- Lấy ID của người dùng vừa được thêm
    SET @user_id = SCOPE_IDENTITY();

    -- Thêm quyền cho người dùng vào bảng user_roles
    INSERT INTO user_roles (user_id, role_id)
    VALUES (@user_id, 2);

    DECLARE @user_role_id BIGINT;

    -- Lấy ID của quyền người dùng vừa được thêm
    SET @user_role_id = SCOPE_IDENTITY();

    -- Thêm tài khoản người dùng vào bảng user_accounts
    INSERT INTO user_accounts (username, password, user_role_id)
    VALUES (@username, @password, @user_role_id);
END;


CREATE PROCEDURE [dbo].[InsertNewUser_employee]
    @first_name NVARCHAR(15),
    @middle_name NVARCHAR(250),
    @last_name NVARCHAR(40),
    @date_of_birth DATE,
    @gender BIT,
    @email VARCHAR(255),
    @address NVARCHAR(255),
    @phone VARCHAR(15),
    @image_user NVARCHAR(MAX),
    @username VARCHAR(255),
    @password VARCHAR(255)
AS
BEGIN
    DECLARE @user_id BIGINT;

    -- Thêm người dùng vào bảng users
    INSERT INTO users (first_name, middle_name, last_name, date_of_birth, gender, address, phone, email, image_user)
    VALUES (@first_name, @middle_name, @last_name, @date_of_birth, @gender, @address, @phone, @email, @image_user);

    -- Lấy ID của người dùng vừa được thêm
    SET @user_id = SCOPE_IDENTITY();

    -- Thêm quyền cho người dùng vào bảng user_roles
    INSERT INTO user_roles (user_id, role_id)
    VALUES (@user_id, 3);

    DECLARE @user_role_id BIGINT;

    -- Lấy ID của quyền người dùng vừa được thêm
    SET @user_role_id = SCOPE_IDENTITY();

    -- Thêm tài khoản người dùng vào bảng user_accounts
    INSERT INTO user_accounts (username, password, user_role_id)
    VALUES (@username, @password, @user_role_id);
END;

CREATE PROCEDURE [dbo].[InsertNewUser_manager]
    @first_name NVARCHAR(15),
    @middle_name NVARCHAR(250),
    @last_name NVARCHAR(40),
    @date_of_birth DATE,
    @gender BIT,
    @email VARCHAR(255),
    @address NVARCHAR(255),
    @phone VARCHAR(15),
    @image_user NVARCHAR(MAX),
    @username VARCHAR(255),
    @password VARCHAR(255)
AS
BEGIN
    DECLARE @user_id BIGINT;

    -- Thêm người dùng vào bảng users
    INSERT INTO users (first_name, middle_name, last_name, date_of_birth, gender, address, phone, email, image_user)
    VALUES (@first_name, @middle_name, @last_name, @date_of_birth, @gender, @address, @phone, @email, @image_user);

    -- Lấy ID của người dùng vừa được thêm
    SET @user_id = SCOPE_IDENTITY();

    -- Thêm quyền cho người dùng vào bảng user_roles
    INSERT INTO user_roles (user_id, role_id)
    VALUES (@user_id, 5);

    DECLARE @user_role_id BIGINT;

    -- Lấy ID của quyền người dùng vừa được thêm
    SET @user_role_id = SCOPE_IDENTITY();

    -- Thêm tài khoản người dùng vào bảng user_accounts
    INSERT INTO user_accounts (username, password, user_role_id)
    VALUES (@username, @password, @user_role_id);
END;


CREATE PROCEDURE [dbo].[InsertNewUser_warehouse]
    @first_name NVARCHAR(15),
    @middle_name NVARCHAR(250),
    @last_name NVARCHAR(40),
    @date_of_birth DATE,
    @gender BIT,
    @email VARCHAR(255),
    @address NVARCHAR(255),
    @phone VARCHAR(15),
    @image_user NVARCHAR(MAX),
    @username VARCHAR(255),
    @password VARCHAR(255)
AS
BEGIN
    DECLARE @user_id BIGINT;

    -- Thêm người dùng vào bảng users
    INSERT INTO users (first_name, middle_name, last_name, date_of_birth, gender, address, phone, email, image_user)
    VALUES (@first_name, @middle_name, @last_name, @date_of_birth, @gender, @address, @phone, @email, @image_user);

    -- Lấy ID của người dùng vừa được thêm
    SET @user_id = SCOPE_IDENTITY();

    -- Thêm quyền cho người dùng vào bảng user_roles
    INSERT INTO user_roles (user_id, role_id)
    VALUES (@user_id, 4);

    DECLARE @user_role_id BIGINT;

    -- Lấy ID của quyền người dùng vừa được thêm
    SET @user_role_id = SCOPE_IDENTITY();

    -- Thêm tài khoản người dùng vào bảng user_accounts
    INSERT INTO user_accounts (username, password, user_role_id)
    VALUES (@username, @password, @user_role_id);
END;
