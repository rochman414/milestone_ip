/*
 Navicat Premium Data Transfer

 Source Server         : localhost_5432
 Source Server Type    : PostgreSQL
 Source Server Version : 120007
 Source Host           : localhost:5432
 Source Catalog        : milestone_ip
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 120007
 File Encoding         : 65001

 Date: 21/06/2021 22:48:26
*/


-- ----------------------------
-- Sequence structure for detail_development_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_development_seq";
CREATE SEQUENCE "public"."detail_development_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for detail_oprational_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_oprational_seq";
CREATE SEQUENCE "public"."detail_oprational_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for detail_sales_marketing_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."detail_sales_marketing_seq";
CREATE SEQUENCE "public"."detail_sales_marketing_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for milestone_development_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."milestone_development_seq";
CREATE SEQUENCE "public"."milestone_development_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for milestone_oprational_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."milestone_oprational_seq";
CREATE SEQUENCE "public"."milestone_oprational_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for milestone_sales_marketing_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."milestone_sales_marketing_seq";
CREATE SEQUENCE "public"."milestone_sales_marketing_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for name_code_tl_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."name_code_tl_seq";
CREATE SEQUENCE "public"."name_code_tl_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for status_penerimaan_milestone_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."status_penerimaan_milestone_seq";
CREATE SEQUENCE "public"."status_penerimaan_milestone_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tahun_milestone_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tahun_milestone_seq";
CREATE SEQUENCE "public"."tahun_milestone_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_seq";
CREATE SEQUENCE "public"."users_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for detail_development
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_development";
CREATE TABLE "public"."detail_development" (
  "id" int4 NOT NULL DEFAULT nextval('detail_development_seq'::regclass),
  "milestone_id" int4 NOT NULL,
  "week" int2 NOT NULL,
  "status_id" int2 NOT NULL,
  "keterangan_update" text COLLATE "pg_catalog"."default",
  "kendala_pencapaian_milestone" text COLLATE "pg_catalog"."default",
  "users_id" int2 NOT NULL
)
;

-- ----------------------------
-- Records of detail_development
-- ----------------------------

-- ----------------------------
-- Table structure for detail_oprational
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_oprational";
CREATE TABLE "public"."detail_oprational" (
  "id" int4 NOT NULL DEFAULT nextval('detail_oprational_seq'::regclass),
  "milestone_id" int4 NOT NULL,
  "week" int2 NOT NULL,
  "status_id" int2 NOT NULL,
  "keterangan_update" text COLLATE "pg_catalog"."default",
  "kendala_pencapaian_milestone" text COLLATE "pg_catalog"."default",
  "users_id" int2 NOT NULL
)
;

-- ----------------------------
-- Records of detail_oprational
-- ----------------------------

-- ----------------------------
-- Table structure for detail_sales_marketing
-- ----------------------------
DROP TABLE IF EXISTS "public"."detail_sales_marketing";
CREATE TABLE "public"."detail_sales_marketing" (
  "id" int4 NOT NULL DEFAULT nextval('detail_sales_marketing_seq'::regclass),
  "milestone_id" int4 NOT NULL,
  "week" int2 NOT NULL,
  "status_id" int2 NOT NULL,
  "keterangan_update" text COLLATE "pg_catalog"."default",
  "kendala_pencapaian_milestone" text COLLATE "pg_catalog"."default",
  "users_id" int2 NOT NULL
)
;

-- ----------------------------
-- Records of detail_sales_marketing
-- ----------------------------

-- ----------------------------
-- Table structure for division_milestone
-- ----------------------------
DROP TABLE IF EXISTS "public"."division_milestone";
CREATE TABLE "public"."division_milestone" (
  "id" int4 NOT NULL,
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of division_milestone
-- ----------------------------
INSERT INTO "public"."division_milestone" VALUES (1, 'Sales & Marketing');
INSERT INTO "public"."division_milestone" VALUES (2, 'Development');
INSERT INTO "public"."division_milestone" VALUES (3, 'Operational');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS "public"."kategori";
CREATE TABLE "public"."kategori" (
  "id" int4 NOT NULL,
  "name" varchar(40) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO "public"."kategori" VALUES (1, 'Rutinitas');
INSERT INTO "public"."kategori" VALUES (2, 'Improvement');
INSERT INTO "public"."kategori" VALUES (3, 'Development');

-- ----------------------------
-- Table structure for milestone_development
-- ----------------------------
DROP TABLE IF EXISTS "public"."milestone_development";
CREATE TABLE "public"."milestone_development" (
  "id" int4 NOT NULL DEFAULT nextval('milestone_development_seq'::regclass),
  "code_tl_id" int2 NOT NULL,
  "project" text COLLATE "pg_catalog"."default" NOT NULL,
  "milestone" text COLLATE "pg_catalog"."default" NOT NULL,
  "kategori_id" int2 NOT NULL,
  "tahun_milestone" int2 NOT NULL
)
;

-- ----------------------------
-- Records of milestone_development
-- ----------------------------

-- ----------------------------
-- Table structure for milestone_oprational
-- ----------------------------
DROP TABLE IF EXISTS "public"."milestone_oprational";
CREATE TABLE "public"."milestone_oprational" (
  "id" int4 NOT NULL DEFAULT nextval('milestone_oprational_seq'::regclass),
  "code_tl_id" int2 NOT NULL,
  "project" text COLLATE "pg_catalog"."default" NOT NULL,
  "milestone" text COLLATE "pg_catalog"."default" NOT NULL,
  "kategori_id" int2 NOT NULL,
  "tahun_milestone" int2 NOT NULL
)
;

-- ----------------------------
-- Records of milestone_oprational
-- ----------------------------

-- ----------------------------
-- Table structure for milestone_sales_marketing
-- ----------------------------
DROP TABLE IF EXISTS "public"."milestone_sales_marketing";
CREATE TABLE "public"."milestone_sales_marketing" (
  "id" int4 NOT NULL DEFAULT nextval('milestone_sales_marketing_seq'::regclass),
  "code_tl_id" int2 NOT NULL,
  "project" text COLLATE "pg_catalog"."default" NOT NULL,
  "milestone" text COLLATE "pg_catalog"."default" NOT NULL,
  "kategori_id" int2,
  "tahun_milestone" int2 NOT NULL
)
;

-- ----------------------------
-- Records of milestone_sales_marketing
-- ----------------------------

-- ----------------------------
-- Table structure for name_code_tl
-- ----------------------------
DROP TABLE IF EXISTS "public"."name_code_tl";
CREATE TABLE "public"."name_code_tl" (
  "id" int4 NOT NULL DEFAULT nextval('name_code_tl_seq'::regclass),
  "code_tl" varchar(20) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "division_id" int2 NOT NULL,
  "status" int2 NOT NULL,
  "departemen" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of name_code_tl
-- ----------------------------

-- ----------------------------
-- Table structure for status_code
-- ----------------------------
DROP TABLE IF EXISTS "public"."status_code";
CREATE TABLE "public"."status_code" (
  "id" int4 NOT NULL,
  "code" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(40) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of status_code
-- ----------------------------
INSERT INTO "public"."status_code" VALUES (1, 'T', 'Target Milestone');
INSERT INTO "public"."status_code" VALUES (2, 'P', 'In Progress');
INSERT INTO "public"."status_code" VALUES (3, 'D', 'Done');
INSERT INTO "public"."status_code" VALUES (4, 'X', 'Tidak Tercapai');
INSERT INTO "public"."status_code" VALUES (5, 'O', 'Pending/Mundur');

-- ----------------------------
-- Table structure for status_penerimaan_milestone
-- ----------------------------
DROP TABLE IF EXISTS "public"."status_penerimaan_milestone";
CREATE TABLE "public"."status_penerimaan_milestone" (
  "id" int4 NOT NULL DEFAULT nextval('status_penerimaan_milestone_seq'::regclass),
  "code_tl_id" int2 NOT NULL,
  "update_week" int2 NOT NULL,
  "tahun" int2 NOT NULL,
  "status_penerimaan" varchar(40) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of status_penerimaan_milestone
-- ----------------------------

-- ----------------------------
-- Table structure for tahun_milestone
-- ----------------------------
DROP TABLE IF EXISTS "public"."tahun_milestone";
CREATE TABLE "public"."tahun_milestone" (
  "id" int4 NOT NULL DEFAULT nextval('tahun_milestone_seq'::regclass),
  "tahun" int2 NOT NULL
)
;

-- ----------------------------
-- Records of tahun_milestone
-- ----------------------------
INSERT INTO "public"."tahun_milestone" VALUES (6, 2019);
INSERT INTO "public"."tahun_milestone" VALUES (7, 2020);
INSERT INTO "public"."tahun_milestone" VALUES (8, 2021);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int4 NOT NULL DEFAULT nextval('users_seq'::regclass),
  "name" varchar(200) COLLATE "pg_catalog"."default" NOT NULL,
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "role_id" int2 NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'admin', 'admin', 1, '$2y$10$4Xx/j/tgEs6PLY2UGgziZuWejd.AbqIjsMJkJU4fKIqd.ZHsebBdG');
INSERT INTO "public"."users" VALUES (30, 'bambang', 'bam', 1, '$2y$10$NllEq3Dnkt9y4qR5lOI17ubTg3gWv9Q4alYSYcC/LyTvrovVDkIEq');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."detail_development_seq"
OWNED BY "public"."detail_development"."id";
SELECT setval('"public"."detail_development_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."detail_oprational_seq"
OWNED BY "public"."detail_oprational"."id";
SELECT setval('"public"."detail_oprational_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."detail_sales_marketing_seq"
OWNED BY "public"."detail_sales_marketing"."id";
SELECT setval('"public"."detail_sales_marketing_seq"', 10, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."milestone_development_seq"
OWNED BY "public"."milestone_development"."id";
SELECT setval('"public"."milestone_development_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."milestone_oprational_seq"
OWNED BY "public"."milestone_oprational"."id";
SELECT setval('"public"."milestone_oprational_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."milestone_sales_marketing_seq"
OWNED BY "public"."milestone_sales_marketing"."id";
SELECT setval('"public"."milestone_sales_marketing_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."name_code_tl_seq"
OWNED BY "public"."name_code_tl"."id";
SELECT setval('"public"."name_code_tl_seq"', 20, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."status_penerimaan_milestone_seq"
OWNED BY "public"."status_penerimaan_milestone"."id";
SELECT setval('"public"."status_penerimaan_milestone_seq"', 2, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."tahun_milestone_seq"
OWNED BY "public"."tahun_milestone"."id";
SELECT setval('"public"."tahun_milestone_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_seq"', 32, true);

-- ----------------------------
-- Primary Key structure for table detail_development
-- ----------------------------
ALTER TABLE "public"."detail_development" ADD CONSTRAINT "detail_development_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table detail_oprational
-- ----------------------------
ALTER TABLE "public"."detail_oprational" ADD CONSTRAINT "detail_oprational_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table detail_sales_marketing
-- ----------------------------
ALTER TABLE "public"."detail_sales_marketing" ADD CONSTRAINT "detail_sales_marketing_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table division_milestone
-- ----------------------------
ALTER TABLE "public"."division_milestone" ADD CONSTRAINT "type_milestone_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table kategori
-- ----------------------------
ALTER TABLE "public"."kategori" ADD CONSTRAINT "kategori_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table milestone_development
-- ----------------------------
ALTER TABLE "public"."milestone_development" ADD CONSTRAINT "milestone_development_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table milestone_oprational
-- ----------------------------
ALTER TABLE "public"."milestone_oprational" ADD CONSTRAINT "milestone_oprational_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table milestone_sales_marketing
-- ----------------------------
ALTER TABLE "public"."milestone_sales_marketing" ADD CONSTRAINT "milestone_sales_marketing_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table name_code_tl
-- ----------------------------
ALTER TABLE "public"."name_code_tl" ADD CONSTRAINT "name_code_tl_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table status_code
-- ----------------------------
ALTER TABLE "public"."status_code" ADD CONSTRAINT "status_code_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table status_penerimaan_milestone
-- ----------------------------
ALTER TABLE "public"."status_penerimaan_milestone" ADD CONSTRAINT "status_penerimaan_milestone_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table tahun_milestone
-- ----------------------------
ALTER TABLE "public"."tahun_milestone" ADD CONSTRAINT "tahun_milestone_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
