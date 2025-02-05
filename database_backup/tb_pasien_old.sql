--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2025-02-03 22:49:57

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
SET row_security = on;

DROP DATABASE rsi_purwokerto_kp;
--
-- TOC entry 4865 (class 1262 OID 16460)
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
SET row_security = on;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 219 (class 1259 OID 16815)
-- Name: tb_pasien_old; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tb_pasien_old (
    id_pasien integer NOT NULL,
    nama_pasien character varying(50) NOT NULL,
    nik character varying(16) NOT NULL,
    tanggal_lahir date NOT NULL,
    jk character varying(10) NOT NULL,
    alamat text NOT NULL,
    no_telepon character varying(15) NOT NULL,
    golongan_darah character varying(3) NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT pasien_golongan_darah_check CHECK (((golongan_darah)::text = ANY (ARRAY[('A'::character varying)::text, ('B'::character varying)::text, ('AB'::character varying)::text, ('O'::character varying)::text,('-'::character varying)::text]]))),
    CONSTRAINT tb_pasien_jk_check CHECK (((jk)::text = ANY (ARRAY[('L'::character varying)::text, ('P'::character varying)::text])))
);


ALTER TABLE public.tb_pasien_old OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16824)
-- Name: pasien_id_pasien_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pasien_id_pasien_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pasien_id_pasien_seq OWNER TO postgres;

--
-- TOC entry 4867 (class 0 OID 0)
-- Dependencies: 220
-- Name: pasien_id_pasien_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pasien_id_pasien_seq OWNED BY public.tb_pasien_old.id_pasien;


--
-- TOC entry 4701 (class 2604 OID 16825)
-- Name: tb_pasien_old id_pasien; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien_old ALTER COLUMN id_pasien SET DEFAULT nextval('public.pasien_id_pasien_seq'::regclass);


--
-- TOC entry 4858 (class 0 OID 16815)
-- Dependencies: 219
-- Data for Name: tb_pasien_old; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4868 (class 0 OID 0)
-- Dependencies: 220
-- Name: pasien_id_pasien_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pasien_id_pasien_seq', 1, false);


--
-- TOC entry 4707 (class 2606 OID 16827)
-- Name: tb_pasien_old pasien_nik_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien_old
    ADD CONSTRAINT pasien_nik_key UNIQUE (nik);


--
-- TOC entry 4709 (class 2606 OID 16829)
-- Name: tb_pasien_old pasien_no_telepon_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien_old
    ADD CONSTRAINT pasien_no_telepon_key UNIQUE (no_telepon);


--
-- TOC entry 4711 (class 2606 OID 16831)
-- Name: tb_pasien_old pasien_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tb_pasien_old
    ADD CONSTRAINT pasien_pkey PRIMARY KEY (id_pasien);


--
-- TOC entry 4712 (class 2620 OID 16832)
-- Name: tb_pasien_old trigger_pasien_update; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER trigger_pasien_update AFTER UPDATE ON public.tb_pasien_old FOR EACH ROW EXECUTE FUNCTION public.log_pasien_update();


--
-- TOC entry 4866 (class 0 OID 0)
-- Dependencies: 219
-- Name: TABLE tb_pasien_old; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL ON TABLE public.tb_pasien_old TO tama;


-- Completed on 2025-02-03 22:49:58

--
-- PostgreSQL database dump complete
--

