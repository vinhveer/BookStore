CREATE PROCEDURE GetUserInformation_no
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        r.role_name,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id;
END;

-- Tìm kiếm:
CREATE PROCEDURE SearchUsers
    @keyword NVARCHAR(255)
AS
BEGIN
   SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        r.role_name,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
    WHERE
        CONCAT(u.first_name, ' ', u.middle_name, ' ', u.last_name) LIKE '%' + @keyword + '%' OR
		LOWER(r.role_name) LIKE '%' + @keyword  + '%' OR
		LOWER(u.email) LIKE '%' + @keyword + '%';
END;


-- Quản lý kho
CREATE PROCEDURE GetUserInformation_warehouse
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        ua.password,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
	WHERE r.role_id=4;
END;


--- admin
CREATE PROCEDURE GetUserInformation_admin
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        ua.password,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
	WHERE r.role_id=2;
END;

-- customer

CREATE PROCEDURE GetUserInformation_customer
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        ua.password,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
	WHERE r.role_id=1;
END;

-- Nhân viên
CREATE PROCEDURE GetUserInformation_employee
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        ua.password,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
	WHERE r.role_id=3;
END;

-- Manager

CREATE PROCEDURE GetUserInformation_manager
AS
BEGIN
    SELECT
        CONCAT(u.last_name, ' ', u.middle_name, ' ', u.first_name) AS full_name,
        u.email,
        ua.password,
        r.role_id,
		u.user_id
    FROM
        users u
    INNER JOIN
        user_roles ur ON u.user_id = ur.user_id
    INNER JOIN
        roles r ON ur.role_id = r.role_id
	INNER JOIN
		user_accounts ua on ua.user_role_id = ur.user_role_id
	WHERE r.role_id=5;
END;
