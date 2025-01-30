"use client"

import { useState, useMemo } from "react"
import { motion, AnimatePresence } from "framer-motion"
import { ChevronDown, Search, Filter } from "lucide-react"

// Mock data for selected students
const selectedStudents = [
  {
    id: 1,
    name: "John Doe",
    gender: "Male",
    faculty: "Science and Technology",
    program: "Computer Science",
    intake: "Fall 2023",
  },
  {
    id: 2,
    name: "Jane Smith",
    gender: "Female",
    faculty: "Science and Technology",
    program: "Mathematics",
    intake: "Fall 2023",
  },
  {
    id: 3,
    name: "Alice Johnson",
    gender: "Female",
    faculty: "Humanities and Social Sciences",
    program: "Psychology",
    intake: "Spring 2024",
  },
  {
    id: 4,
    name: "Bob Williams",
    gender: "Male",
    faculty: "Business and Economics",
    program: "Business Administration",
    intake: "Fall 2023",
  },
  {
    id: 5,
    name: "Emma Brown",
    gender: "Female",
    faculty: "Science and Technology",
    program: "Physics",
    intake: "Spring 2024",
  },
  // Add more mock data as needed
]

const SelectedStudentsList = () => {
  const [expandedFaculty, setExpandedFaculty] = useState<string | null>(null)
  const [searchTerm, setSearchTerm] = useState("")
  const [filterIntake, setFilterIntake] = useState<string | null>(null)

  const groupedStudents = useMemo(() => {
    return selectedStudents.reduce(
      (acc, student) => {
        if (!acc[student.faculty]) {
          acc[student.faculty] = {}
        }
        if (!acc[student.faculty][student.program]) {
          acc[student.faculty][student.program] = []
        }
        acc[student.faculty][student.program].push(student)
        return acc
      },
      {} as Record<string, Record<string, typeof selectedStudents>>,
    )
  }, [])

  const filteredStudents = useMemo(() => {
    return Object.entries(groupedStudents).reduce(
      (acc, [faculty, programs]) => {
        const filteredPrograms = Object.entries(programs).reduce(
          (programAcc, [program, students]) => {
            const filteredStudents = students.filter(
              (student) =>
                student.name.toLowerCase().includes(searchTerm.toLowerCase()) &&
                (!filterIntake || student.intake === filterIntake),
            )
            if (filteredStudents.length > 0) {
              programAcc[program] = filteredStudents
            }
            return programAcc
          },
          {} as Record<string, typeof selectedStudents>,
        )

        if (Object.keys(filteredPrograms).length > 0) {
          acc[faculty] = filteredPrograms
        }
        return acc
      },
      {} as Record<string, Record<string, typeof selectedStudents>>,
    )
  }, [groupedStudents, searchTerm, filterIntake])

  const intakes = useMemo(() => {
    return Array.from(new Set(selectedStudents.map((student) => student.intake)))
  }, [])

  return (
    <div className="space-y-8">
      <div className="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
        <div className="relative">
          <input
            type="text"
            placeholder="Search students..."
            className="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500"
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
          />
          <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
        </div>
        <div className="relative">
          <select
            className="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none"
            value={filterIntake || ""}
            onChange={(e) => setFilterIntake(e.target.value || null)}
          >
            <option value="">All Intakes</option>
            {intakes.map((intake) => (
              <option key={intake} value={intake}>
                {intake}
              </option>
            ))}
          </select>
          <Filter className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
        </div>
      </div>

      {Object.entries(filteredStudents).map(([faculty, programs]) => (
        <motion.div
          key={faculty}
          className="bg-white rounded-xl shadow-lg overflow-hidden"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          <button
            className="w-full text-left px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold flex justify-between items-center"
            onClick={() => setExpandedFaculty(expandedFaculty === faculty ? null : faculty)}
          >
            <span className="text-xl">{faculty}</span>
            <motion.span animate={{ rotate: expandedFaculty === faculty ? 180 : 0 }} transition={{ duration: 0.3 }}>
              <ChevronDown className="w-6 h-6" />
            </motion.span>
          </button>
          <AnimatePresence>
            {expandedFaculty === faculty && (
              <motion.div
                initial={{ opacity: 0, height: 0 }}
                animate={{ opacity: 1, height: "auto" }}
                exit={{ opacity: 0, height: 0 }}
                transition={{ duration: 0.3 }}
              >
                {Object.entries(programs).map(([program, students]) => (
                  <div key={program} className="px-6 py-4 border-b last:border-b-0">
                    <h3 className="font-semibold text-lg mb-2 text-gray-800">{program}</h3>
                    <div className="overflow-x-auto">
                      <table className="min-w-full">
                        <thead>
                          <tr className="bg-gray-100">
                            <th className="px-4 py-2 text-left">Name</th>
                            <th className="px-4 py-2 text-left">Gender</th>
                            <th className="px-4 py-2 text-left">Intake</th>
                          </tr>
                        </thead>
                        <tbody>
                          {students.map((student) => (
                            <motion.tr
                              key={student.id}
                              initial={{ opacity: 0 }}
                              animate={{ opacity: 1 }}
                              transition={{ duration: 0.3 }}
                              className="hover:bg-gray-50"
                            >
                              <td className="px-4 py-2">{student.name}</td>
                              <td className="px-4 py-2">{student.gender}</td>
                              <td className="px-4 py-2">{student.intake}</td>
                            </motion.tr>
                          ))}
                        </tbody>
                      </table>
                    </div>
                  </div>
                ))}
              </motion.div>
            )}
          </AnimatePresence>
        </motion.div>
      ))}
    </div>
  )
}

export default SelectedStudentsList

