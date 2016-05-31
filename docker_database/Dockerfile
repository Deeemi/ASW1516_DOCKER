FROM ubuntu:14.04

RUN apt-get update && apt-get install -y postgresql

EXPOSE 5432

COPY ./conf/postgresql.conf /etc/postgresql/9.3/main/postgresql.conf

COPY ./conf/pg_hba.conf /etc/postgresql/9.3/main/pg_hba.conf

USER postgres

RUN /etc/init.d/postgresql start && createdb database && psql -d database -c 'CREATE TABLE squadra (idsquadra character varying(3) NOT NULL, nomesquadra character varying(30), citta character varying(30), annofondazione character varying(4), stadio character varying(30), CONSTRAINT idsquadra PRIMARY KEY (idsquadra)); CREATE TABLE calciatore (id serial NOT NULL, nome character varying(20), cognome character varying(20), nascita date, nazione character varying(30), ruolo character varying(3), squadra character varying(3), CONSTRAINT id PRIMARY KEY (id), CONSTRAINT squadraidquadra FOREIGN KEY (squadra) REFERENCES public.squadra (idsquadra) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION);'

CMD ["/usr/lib/postgresql/9.3/bin/postgres", "-D", "/var/lib/postgresql/9.3/main", "-c", "config_file=/etc/postgresql/9.3/main/postgresql.conf"]
