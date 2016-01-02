#!/bin/sh


PAID="ci-modern-accounting-firm.zip"
FREE="ci-modern-accounting-firm-free.zip"

scp $PAID 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$PAID
scp $FREE 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$FREE

PAID_METADATA="ci-modern-accounting-firm-free_version_metadata.json"
FREE_METADATA="ci-modern-accounting-firm_version_metadata.json"

scp $PAID_METADATA 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$PAID_METADATA
scp $FREE_METADATA 7fcnr0xvwk1nik@sftp.rax.ord.openhostingservice.com:/ci-modern-accounting-firm/htdocs/downloads/themes/$FREE_METADATA
