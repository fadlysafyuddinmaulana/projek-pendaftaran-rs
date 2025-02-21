--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2025-02-21 14:18:15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE IF EXISTS rsi_purwokerto_kp;
--
-- TOC entry 4946 (class 1262 OID 25367)
-- Name: rsi_purwokerto_kp; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE rsi_purwokerto_kp WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Indonesian_Indonesia.1252';


ALTER DATABASE rsi_purwokerto_kp OWNER TO postgres;

\connect rsi_purwokerto_kp

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 231 (class 1255 OID 26202)
-- Name: format_whatsapp_number(); Type: FUNCTION; Schema: public; Owner: postgres
--

CREATE FUNCTION public.format_whatsapp_number() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    -- Ensure the number is at least 12 characters long before extracting
    IF LENGTH(NEW.no_whatsapp) >= 12 THEN
        NEW.no_whatsapp := SUBSTRING(NEW.no_whatsapp FROM 2 FOR 11);
    END IF;
    RETURN NEW;
END;
$$;


ALTER FUNCTION public.format_whatsapp_number() OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 230 (class 1259 OID 34526)
-- Name: doctors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doctors (
    id integer NOT NULL,
    name character varying(100) NOT NULL,
    specialization character varying(100) NOT NULL,
    specialist_doctor character varying(100) NOT NULL,
    contact_number character varying(20) NOT NULL,
    status character varying(10) DEFAULT 'open'::character varying NOT NULL,
    name_day character varying(20) NOT NULL,
    CONSTRAINT doctors_status_check CHECK (((status)::text = ANY ((ARRAY['open'::character varying, 'close'::character varying])::text[])))
);


ALTER TABLE public.doctors OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 34525)
-- Name: doctors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.doctors_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.doctors_id_seq OWNER TO postgres;

--
-- TOC entry 4947 (class 0 OID 0)
-- Dependencies: 229
-- Name: doctors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.doctors_id_seq OWNED BY public.doctors.id;


--
-- TOC entry 218 (class 1259 OID 26309)
-- Name: patient_documents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.patient_documents (
    id integer NOT NULL,
    patient_number character varying(20),
    file_path character varying(255),
    created_at timestamp without time zone
);


ALTER TABLE public.patient_documents OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 26308)
-- Name: patient_documents_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.patient_documents_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.patient_documents_id_seq OWNER TO postgres;

--
-- TOC entry 4948 (class 0 OID 0)
-- Dependencies: 217
-- Name: patient_documents_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.patient_documents_id_seq OWNED BY public.patient_documents.id;


--
-- TOC entry 228 (class 1259 OID 26625)
-- Name: tb_c_queues; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_c_queues (
    id_queue integer NOT NULL,
    queue_number character varying(10) NOT NULL,
    patient_id integer,
    status character varying(20) DEFAULT 'waiting'::character varying,
    queue_type character varying(20) NOT NULL,
    queue_date date DEFAULT CURRENT_DATE,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    called_at timestamp without time zone,
    completed_at timestamp without time zone,
    CONSTRAINT tb_c_queues_queue_type_check CHECK (((queue_type)::text = ANY ((ARRAY['registration'::character varying, 'checkup'::character varying])::text[]))),
    CONSTRAINT tb_c_queues_status_check CHECK (((status)::text = ANY ((ARRAY['waiting'::character varying, 'in_progress'::character varying, 'completed'::character varying, 'cancelled'::character varying])::text[])))
);


ALTER TABLE public.tb_c_queues OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 26624)
-- Name: tb_c_queues_id_queue_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_c_queues_id_queue_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_c_queues_id_queue_seq OWNER TO postgres;

--
-- TOC entry 4949 (class 0 OID 0)
-- Dependencies: 227
-- Name: tb_c_queues_id_queue_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_c_queues_id_queue_seq OWNED BY public.tb_c_queues.id_queue;


--
-- TOC entry 226 (class 1259 OID 26607)
-- Name: tb_kontrol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_kontrol (
    id_kontrol integer NOT NULL,
    patient_number character varying(20) NOT NULL,
    checkup_id integer,
    nama_pasien character varying(100) NOT NULL,
    no_whatsapp character varying(100) NOT NULL,
    jk character varying(10) NOT NULL,
    email character varying(50),
    dokter character varying(50),
    place_of_birth text NOT NULL,
    date_of_birth character varying(20) NOT NULL,
    tgl_kontrol character varying(20) NOT NULL,
    barcode text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT tb_kontrol_jk_check CHECK (((jk)::text = ANY ((ARRAY['Laki-Laki'::character varying, 'Perempuan'::character varying])::text[])))
);


ALTER TABLE public.tb_kontrol OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 26606)
-- Name: tb_kontrol_id_kontrol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_kontrol_id_kontrol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_kontrol_id_kontrol_seq OWNER TO postgres;

--
-- TOC entry 4950 (class 0 OID 0)
-- Dependencies: 225
-- Name: tb_kontrol_id_kontrol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_kontrol_id_kontrol_seq OWNED BY public.tb_kontrol.id_kontrol;


--
-- TOC entry 222 (class 1259 OID 26465)
-- Name: tb_pasien; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_pasien (
    id_pasien integer NOT NULL,
    patient_number character varying(20) NOT NULL,
    card_number character varying(50) NOT NULL,
    nama_pasien character varying(100) NOT NULL,
    card_type character varying(20) NOT NULL,
    email character varying(100),
    no_whatsapp character varying(20) NOT NULL,
    no_hp1 character varying(20) NOT NULL,
    no_hp2 character varying(20),
    jk character varying(10) NOT NULL,
    agama character varying(20) NOT NULL,
    ttl character varying(50) NOT NULL,
    status_perkawinan character varying(20) NOT NULL,
    pendidikan character varying(15) NOT NULL,
    pekerjaan character varying(30) NOT NULL,
    goldar character varying(3) NOT NULL,
    provinsi character varying(25) NOT NULL,
    kabupaten character varying(25) NOT NULL,
    alamat text NOT NULL,
    dokter character varying(50),
    keluhan text NOT NULL,
    barcode text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT tb_pasien_agama_check CHECK (((agama)::text = ANY ((ARRAY['Islam'::character varying, 'Kristen'::character varying, 'Katolik'::character varying, 'Hindu'::character varying, 'Buddha'::character varying, 'Konghucu'::character varying])::text[]))),
    CONSTRAINT tb_pasien_card_type_check CHECK (((card_type)::text = ANY ((ARRAY['KTP'::character varying, 'SIM'::character varying, 'Passport'::character varying])::text[]))),
    CONSTRAINT tb_pasien_goldar_check CHECK (((goldar)::text = ANY ((ARRAY['A'::character varying, 'B'::character varying, 'AB'::character varying, 'O'::character varying, '-'::character varying])::text[]))),
    CONSTRAINT tb_pasien_jk_check CHECK (((jk)::text = ANY ((ARRAY['Laki-Laki'::character varying, 'Perempuan'::character varying])::text[]))),
    CONSTRAINT tb_pasien_pekerjaan_check CHECK (((pekerjaan)::text = ANY ((ARRAY['Pegawai Negeri'::character varying, 'Pegawai Swasta'::character varying, 'Wiraswasta'::character varying, 'Pelajar/Mahasiswa'::character varying, 'Tidak Bekerja'::character varying])::text[]))),
    CONSTRAINT tb_pasien_pendidikan_check CHECK (((pendidikan)::text = ANY ((ARRAY['SD'::character varying, 'SMP'::character varying, 'SMA/SMK'::character varying, 'D3'::character varying, 'S1'::character varying, 'S2'::character varying, 'S3'::character varying, 'Tidak Sekolah'::character varying])::text[]))),
    CONSTRAINT tb_pasien_status_perkawinan_check CHECK (((status_perkawinan)::text = ANY ((ARRAY['Belum Menikah'::character varying, 'Menikah'::character varying, 'Cerai'::character varying])::text[])))
);


ALTER TABLE public.tb_pasien OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 26464)
-- Name: tb_pasien_id_pasien_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_pasien_id_pasien_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_pasien_id_pasien_seq OWNER TO postgres;

--
-- TOC entry 4951 (class 0 OID 0)
-- Dependencies: 221
-- Name: tb_pasien_id_pasien_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_pasien_id_pasien_seq OWNED BY public.tb_pasien.id_pasien;


--
-- TOC entry 224 (class 1259 OID 26501)
-- Name: tb_r_queues; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_r_queues (
    id_queue integer NOT NULL,
    queue_number character varying(10) NOT NULL,
    patient_id integer,
    status character varying(20) DEFAULT 'waiting'::character varying,
    queue_type character varying(20) NOT NULL,
    queue_date date DEFAULT CURRENT_DATE,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    called_at timestamp without time zone,
    completed_at timestamp without time zone,
    CONSTRAINT tb_r_queues_queue_type_check CHECK (((queue_type)::text = ANY ((ARRAY['registration'::character varying, 'checkup'::character varying])::text[]))),
    CONSTRAINT tb_r_queues_status_check CHECK (((status)::text = ANY ((ARRAY['waiting'::character varying, 'in_progress'::character varying, 'completed'::character varying, 'cancelled'::character varying])::text[])))
);


ALTER TABLE public.tb_r_queues OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 26500)
-- Name: tb_r_queues_id_queue_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_r_queues_id_queue_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_r_queues_id_queue_seq OWNER TO postgres;

--
-- TOC entry 4952 (class 0 OID 0)
-- Dependencies: 223
-- Name: tb_r_queues_id_queue_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_r_queues_id_queue_seq OWNED BY public.tb_r_queues.id_queue;


--
-- TOC entry 220 (class 1259 OID 26453)
-- Name: tb_username; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_username (
    id_username integer NOT NULL,
    card_number character varying(20) NOT NULL,
    nama_pasien character varying(100) NOT NULL,
    no_whatsapp character varying(20) NOT NULL,
    jk character varying(10) NOT NULL,
    email text NOT NULL,
    place_of_birth text NOT NULL,
    date_of_birth character varying(20) NOT NULL,
    username character varying(25),
    password text,
    completed_at timestamp without time zone,
    CONSTRAINT tb_username_jk_check CHECK (((jk)::text = ANY ((ARRAY['Laki-Laki'::character varying, 'Perempuan'::character varying])::text[])))
);


ALTER TABLE public.tb_username OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 26452)
-- Name: tb_username_id_username_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tb_username_id_username_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tb_username_id_username_seq OWNER TO postgres;

--
-- TOC entry 4953 (class 0 OID 0)
-- Dependencies: 219
-- Name: tb_username_id_username_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tb_username_id_username_seq OWNED BY public.tb_username.id_username;


--
-- TOC entry 4740 (class 2604 OID 34529)
-- Name: doctors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctors ALTER COLUMN id SET DEFAULT nextval('public.doctors_id_seq'::regclass);


--
-- TOC entry 4726 (class 2604 OID 26312)
-- Name: patient_documents id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient_documents ALTER COLUMN id SET DEFAULT nextval('public.patient_documents_id_seq'::regclass);


--
-- TOC entry 4736 (class 2604 OID 26628)
-- Name: tb_c_queues id_queue; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_c_queues ALTER COLUMN id_queue SET DEFAULT nextval('public.tb_c_queues_id_queue_seq'::regclass);


--
-- TOC entry 4734 (class 2604 OID 26610)
-- Name: tb_kontrol id_kontrol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_kontrol ALTER COLUMN id_kontrol SET DEFAULT nextval('public.tb_kontrol_id_kontrol_seq'::regclass);


--
-- TOC entry 4728 (class 2604 OID 26468)
-- Name: tb_pasien id_pasien; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien ALTER COLUMN id_pasien SET DEFAULT nextval('public.tb_pasien_id_pasien_seq'::regclass);


--
-- TOC entry 4730 (class 2604 OID 26504)
-- Name: tb_r_queues id_queue; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_r_queues ALTER COLUMN id_queue SET DEFAULT nextval('public.tb_r_queues_id_queue_seq'::regclass);


--
-- TOC entry 4727 (class 2604 OID 26456)
-- Name: tb_username id_username; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_username ALTER COLUMN id_username SET DEFAULT nextval('public.tb_username_id_username_seq'::regclass);


--
-- TOC entry 4940 (class 0 OID 34526)
-- Dependencies: 230
-- Data for Name: doctors; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.doctors VALUES (1, 'Dr. Budi Santoso', 'Kardiologi', 'Spesialis Jantung', '0812-3456-7890', 'open', 'Senin');
INSERT INTO public.doctors VALUES (2, 'Dr. Siti Aisyah', 'Neurologi', 'Spesialis Saraf', '0813-4567-8901', 'close', 'Selasa');
INSERT INTO public.doctors VALUES (3, 'Dr. Agus Prasetyo', 'Ortopedi', 'Spesialis Tulang', '0814-5678-9012', 'open', 'Rabu');
INSERT INTO public.doctors VALUES (4, 'Dr. Rina Lestari', 'Dermatologi', 'Spesialis Kulit', '0815-6789-0123', 'close', 'Kamis');
INSERT INTO public.doctors VALUES (5, 'Dr. Joko Widodo', 'Pediatri', 'Spesialis Anak', '0816-7890-1234', 'open', 'Jumat');
INSERT INTO public.doctors VALUES (6, 'Dr. Dian Purnama', 'Onkologi', 'Spesialis Kanker', '0817-8901-2345', 'close', 'Sabtu');
INSERT INTO public.doctors VALUES (7, 'Dr. Indah Permata', 'Oftalmologi', 'Spesialis Mata', '0818-9012-3456', 'open', 'Minggu');
INSERT INTO public.doctors VALUES (8, 'Dr. Fajar Hidayat', 'Endokrinologi', 'Spesialis Diabetes', '0819-0123-4567', 'close', 'Senin');
INSERT INTO public.doctors VALUES (9, 'Dr. Lina Kusuma', 'Ginekologi', 'Spesialis Kesehatan Wanita', '0821-1234-5678', 'open', 'Selasa');
INSERT INTO public.doctors VALUES (10, 'Dr. Andi Wijaya', 'Psikiatri', 'Spesialis Kesehatan Mental', '0822-2345-6789', 'close', 'Rabu');


--
-- TOC entry 4928 (class 0 OID 26309)
-- Dependencies: 218
-- Data for Name: patient_documents; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.patient_documents VALUES (1, '202502150001', 'assets/patient_pdfs/patient_202502150001_2025-02-15.pdf', '2025-02-15 15:07:45');
INSERT INTO public.patient_documents VALUES (2, '202502150001', 'assets/patient_pdfs/patient_202502150001_2025-02-15.pdf', '2025-02-15 15:07:45');
INSERT INTO public.patient_documents VALUES (3, NULL, 'assets/patient_pdfs/patient__2025-02-17.pdf', '2025-02-17 13:54:49');


--
-- TOC entry 4938 (class 0 OID 26625)
-- Dependencies: 228
-- Data for Name: tb_c_queues; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_c_queues VALUES (5, 'A001', 5, 'waiting', 'checkup', '2025-02-17', '2025-02-17 20:27:24.400402', NULL, NULL);


--
-- TOC entry 4936 (class 0 OID 26607)
-- Dependencies: 226
-- Data for Name: tb_kontrol; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_kontrol VALUES (5, '202502170001', NULL, 'fadly safyuddin maulana', '085326762048', 'Laki-Laki', 'fadly.m73@gmail.com', 'Dr. Andi Saputra', 'Pemalang', '2001-10-30', '2025-02-17', 'assets/qrcodes/qr_kontrol/202502170001_qr.png', '2025-02-17 20:27:24.400402');


--
-- TOC entry 4932 (class 0 OID 26465)
-- Dependencies: 222
-- Data for Name: tb_pasien; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_pasien VALUES (7, '202502170001', '3327083010010022', 'fadly safyuddin maulana', 'KTP', 'fadly.m73@gmail.com', '85326762048', '085326762048', '', 'Laki-Laki', 'Islam', 'Pemalang,2001-10-30', 'Menikah', 'SMP', 'Pegawai Swasta', 'A', 'aceh', 'aceh_besar', '789 Pine Ave', 'Dr. Citra Lestari', 'test', 'assets/qrcodes/3327083010010022_qr.png', '2025-02-17 19:58:14.513714');
INSERT INTO public.tb_pasien VALUES (9, '202502190001', '3327083010010023', 'fadly', 'KTP', 'fadly.maulana35@yahoo.com', '85326762048', '085326762048', '', 'Laki-Laki', 'Islam', 'Pemalang,2001-02-10', 'Belum Menikah', 'S1', 'Pegawai Swasta', 'A', 'aceh', 'aceh_barat', 'test', 'Dr. Budi Santoso', 'sakit dok', 'assets/qrcodes/3327083010010023_qr.png', '2025-02-19 13:06:27.255883');


--
-- TOC entry 4934 (class 0 OID 26501)
-- Dependencies: 224
-- Data for Name: tb_r_queues; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_r_queues VALUES (2, 'A001', 7, 'waiting', 'registration', '2025-02-17', '2025-02-17 19:58:14.513714', NULL, NULL);
INSERT INTO public.tb_r_queues VALUES (3, 'A001', 9, 'waiting', 'registration', '2025-02-19', '2025-02-19 13:06:27.255883', NULL, NULL);


--
-- TOC entry 4930 (class 0 OID 26453)
-- Dependencies: 220
-- Data for Name: tb_username; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.tb_username VALUES (1, '3327083010010022', 'fadly safyuddin maulana', '085326762048', 'Laki-Laki', 'fadly.m73@gmail.com', 'Pemalang', '2001-10-30', 'fadly231', '1b8b0bb7ecfbbea49ee6349747cf06a2', NULL);
INSERT INTO public.tb_username VALUES (2, '3327083010010023', 'fadly', '085326762048', 'Laki-Laki', 'fadly.maulana35@yahoo.com', 'Pemalang', '2001-02-10', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);


--
-- TOC entry 4954 (class 0 OID 0)
-- Dependencies: 229
-- Name: doctors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.doctors_id_seq', 10, true);


--
-- TOC entry 4955 (class 0 OID 0)
-- Dependencies: 217
-- Name: patient_documents_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.patient_documents_id_seq', 3, true);


--
-- TOC entry 4956 (class 0 OID 0)
-- Dependencies: 227
-- Name: tb_c_queues_id_queue_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_c_queues_id_queue_seq', 5, true);


--
-- TOC entry 4957 (class 0 OID 0)
-- Dependencies: 225
-- Name: tb_kontrol_id_kontrol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_kontrol_id_kontrol_seq', 5, true);


--
-- TOC entry 4958 (class 0 OID 0)
-- Dependencies: 221
-- Name: tb_pasien_id_pasien_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_pasien_id_pasien_seq', 9, true);


--
-- TOC entry 4959 (class 0 OID 0)
-- Dependencies: 223
-- Name: tb_r_queues_id_queue_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_r_queues_id_queue_seq', 3, true);


--
-- TOC entry 4960 (class 0 OID 0)
-- Dependencies: 219
-- Name: tb_username_id_username_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tb_username_id_username_seq', 2, true);


--
-- TOC entry 4777 (class 2606 OID 34533)
-- Name: doctors doctors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctors
    ADD CONSTRAINT doctors_pkey PRIMARY KEY (id);


--
-- TOC entry 4757 (class 2606 OID 26314)
-- Name: patient_documents patient_documents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient_documents
    ADD CONSTRAINT patient_documents_pkey PRIMARY KEY (id);


--
-- TOC entry 4775 (class 2606 OID 26635)
-- Name: tb_c_queues tb_c_queues_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_c_queues
    ADD CONSTRAINT tb_c_queues_pkey PRIMARY KEY (id_queue);


--
-- TOC entry 4771 (class 2606 OID 26618)
-- Name: tb_kontrol tb_kontrol_patient_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_kontrol
    ADD CONSTRAINT tb_kontrol_patient_number_key UNIQUE (patient_number);


--
-- TOC entry 4773 (class 2606 OID 26616)
-- Name: tb_kontrol tb_kontrol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_kontrol
    ADD CONSTRAINT tb_kontrol_pkey PRIMARY KEY (id_kontrol);


--
-- TOC entry 4763 (class 2606 OID 26484)
-- Name: tb_pasien tb_pasien_card_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien
    ADD CONSTRAINT tb_pasien_card_number_key UNIQUE (card_number);


--
-- TOC entry 4765 (class 2606 OID 26482)
-- Name: tb_pasien tb_pasien_patient_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien
    ADD CONSTRAINT tb_pasien_patient_number_key UNIQUE (patient_number);


--
-- TOC entry 4767 (class 2606 OID 26480)
-- Name: tb_pasien tb_pasien_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien
    ADD CONSTRAINT tb_pasien_pkey PRIMARY KEY (id_pasien);


--
-- TOC entry 4769 (class 2606 OID 26511)
-- Name: tb_r_queues tb_r_queues_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_r_queues
    ADD CONSTRAINT tb_r_queues_pkey PRIMARY KEY (id_queue);


--
-- TOC entry 4759 (class 2606 OID 26463)
-- Name: tb_username tb_username_card_number_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_username
    ADD CONSTRAINT tb_username_card_number_key UNIQUE (card_number);


--
-- TOC entry 4761 (class 2606 OID 26461)
-- Name: tb_username tb_username_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_username
    ADD CONSTRAINT tb_username_pkey PRIMARY KEY (id_username);


--
-- TOC entry 4781 (class 2620 OID 26534)
-- Name: tb_pasien before_insert_or_update_pasien; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER before_insert_or_update_pasien BEFORE INSERT OR UPDATE ON public.tb_pasien FOR EACH ROW EXECUTE FUNCTION public.format_whatsapp_number();


--
-- TOC entry 4780 (class 2606 OID 26636)
-- Name: tb_c_queues tb_c_queues_patient_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_c_queues
    ADD CONSTRAINT tb_c_queues_patient_id_fkey FOREIGN KEY (patient_id) REFERENCES public.tb_kontrol(id_kontrol);


--
-- TOC entry 4779 (class 2606 OID 26619)
-- Name: tb_kontrol tb_kontrol_checkup_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_kontrol
    ADD CONSTRAINT tb_kontrol_checkup_id_fkey FOREIGN KEY (checkup_id) REFERENCES public.tb_pasien(id_pasien);


--
-- TOC entry 4778 (class 2606 OID 26512)
-- Name: tb_r_queues tb_r_queues_patient_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_r_queues
    ADD CONSTRAINT tb_r_queues_patient_id_fkey FOREIGN KEY (patient_id) REFERENCES public.tb_pasien(id_pasien);


-- Completed on 2025-02-21 14:18:15

--
-- PostgreSQL database dump complete
--

