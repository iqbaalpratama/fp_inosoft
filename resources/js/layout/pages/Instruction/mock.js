export default {
    invoice: {
        headers: [
            {
                text: 'Instruction ID',
                align: 'start',
                sortable: true,
                value: 'instruction_id',
            },
            { text: 'Link To', value: 'link_to' },
            { text: 'Intruction Type', value: 'intruction_type' },
            { text: 'Assigned Vendor', value: 'assigned_vendor' },
            { text: 'Attention Of', value: 'attention_of' },
            { text: 'Quotation No', value: 'quotation_no' },
            { text: 'Customer PO', value: 'customer_po' },
            
        ],
        invoice_detail: [
            {
                instruction_id: 'SI-2022-0001',
                link_to: "INSP-2020-0001",
                intruction_type: "SI",
                assigned_vendor: "Amarit & Associates Logistic Co Ltd",
                attention_of: "Rigrep Transportation",
                quotation_no: "MITME-ADL-001",
                customer_po: "PO01",

            },
            {
                instruction_id: 'SI-2022-0002',
                link_to: "INSP-2020-0002",
                intruction_type: "SI",
                assigned_vendor: "Alphatrans Pte. Ltd",
                attention_of: "Rigrep Transportation",
                quotation_no: "MITME-ADL-001",
                customer_po: "PO01",

            },
        ],
    }
}
