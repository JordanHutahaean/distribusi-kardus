import sys
import json

# =====================================
# INPUT
# =====================================

target = int(sys.argv[1])

kapA = int(sys.argv[2])
kapB = int(sys.argv[3])
kapC = int(sys.argv[4])

rasioA = int(sys.argv[5])
rasioB = int(sys.argv[6])
rasioC = int(sys.argv[7])

kapasitas = [kapA, kapB, kapC]
rasio = [rasioA, rasioB, rasioC]

# =====================================
# PERHITUNGAN RASIO
# =====================================

kapasitas_siklus = 0

for i in range(3):
    kapasitas_siklus += kapasitas[i] * rasio[i]

jumlah_siklus = target // kapasitas_siklus

jumlah_kardus = []

for i in range(3):
    jumlah_kardus.append(
        jumlah_siklus * rasio[i]
    )

total_distribusi = 0

for i in range(3):
    total_distribusi += (
        jumlah_kardus[i] *
        kapasitas[i]
    )

sisa = target - total_distribusi

# =====================================
# GREEDY
# =====================================

def greedy(sisa):

    urut = sorted(
        kapasitas,
        reverse=True
    )

    total = 0
    pilihan = []

    while total < sisa:

        total += urut[0]
        pilihan.append(
            urut[0]
        )

    kelebihan = total - sisa

    return {
        "pilihan": pilihan,
        "total": total,
        "kelebihan": kelebihan
    }

# =====================================
# BRANCH AND BOUND
# =====================================

def branch_and_bound(sisa):

    best_total = 999999
    best_kelebihan = 999999

    best_a = 0
    best_b = 0
    best_c = 0

    for a in range(0, 6):

        for b in range(0, 6):

            for c in range(0, 6):

                total = (
                    a * kapA +
                    b * kapB +
                    c * kapC
                )

                if total >= sisa:

                    kelebihan = (
                        total - sisa
                    )

                    if kelebihan < best_kelebihan:

                        best_kelebihan = kelebihan
                        best_total = total

                        best_a = a
                        best_b = b
                        best_c = c

    return {
        "kombinasi": [
            f"A={best_a}",
            f"B={best_b}",
            f"C={best_c}"
        ],
        "total": best_total,
        "kelebihan": best_kelebihan
    }

# =====================================
# EKSEKUSI
# =====================================

hasil_greedy = greedy(sisa)

hasil_bnb = branch_and_bound(sisa)

# =====================================
# OUTPUT JSON 
# =====================================

hasil = {

    "jumlahA": jumlah_kardus[0],
    "jumlahB": jumlah_kardus[1],
    "jumlahC": jumlah_kardus[2],

    "totalDistribusi": total_distribusi,

    "sisa": sisa,

    "greedy": hasil_greedy,

    "branchAndBound": hasil_bnb
}

print(json.dumps(hasil))