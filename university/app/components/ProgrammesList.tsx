"use client"

import { useState } from "react"
import { motion, AnimatePresence } from "framer-motion"
import { ChevronDown, BookOpen, Clock, Users } from "lucide-react"

const faculties = [
  {
    name: "Faculty of Science and Technology",
    icon: "🔬",
    programmes: [
      { name: "Computer Science", duration: "4 years", intake: 120 },
      { name: "Mathematics", duration: "3 years", intake: 80 },
      { name: "Physics", duration: "3 years", intake: 60 },
      { name: "Chemistry", duration: "3 years", intake: 70 },
      { name: "Biology", duration: "3 years", intake: 90 },
    ],
  },
  {
    name: "Faculty of Humanities and Social Sciences",
    icon: "📚",
    programmes: [
      { name: "English Literature", duration: "3 years", intake: 100 },
      { name: "Psychology", duration: "4 years", intake: 110 },
      { name: "Sociology", duration: "3 years", intake: 90 },
      { name: "History", duration: "3 years", intake: 70 },
      { name: "Philosophy", duration: "3 years", intake: 50 },
    ],
  },
  {
    name: "Faculty of Business and Economics",
    icon: "💼",
    programmes: [
      { name: "Business Administration", duration: "4 years", intake: 150 },
      { name: "Economics", duration: "3 years", intake: 100 },
      { name: "Accounting", duration: "4 years", intake: 120 },
      { name: "Marketing", duration: "3 years", intake: 90 },
      { name: "Finance", duration: "4 years", intake: 100 },
    ],
  },
]

const ProgrammesList = () => {
  const [expandedFaculty, setExpandedFaculty] = useState<number | null>(null)

  return (
    <div className="space-y-8">
      {faculties.map((faculty, index) => (
        <motion.div
          key={faculty.name}
          className="bg-white rounded-xl shadow-lg overflow-hidden"
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5, delay: index * 0.1 }}
        >
          <button
            className="w-full text-left px-6 py-4 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold flex justify-between items-center"
            onClick={() => setExpandedFaculty(expandedFaculty === index ? null : index)}
          >
            <span className="flex items-center">
              <span className="text-2xl mr-3">{faculty.icon}</span>
              <span className="text-xl">{faculty.name}</span>
            </span>
            <motion.span animate={{ rotate: expandedFaculty === index ? 180 : 0 }} transition={{ duration: 0.3 }}>
              <ChevronDown className="w-6 h-6" />
            </motion.span>
          </button>
          <AnimatePresence>
            {expandedFaculty === index && (
              <motion.div
                initial={{ opacity: 0, height: 0 }}
                animate={{ opacity: 1, height: "auto" }}
                exit={{ opacity: 0, height: 0 }}
                transition={{ duration: 0.3 }}
              >
                <div className="px-6 py-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                  {faculty.programmes.map((programme) => (
                    <motion.div
                      key={programme.name}
                      className="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow duration-300"
                      whileHover={{ scale: 1.03 }}
                      transition={{ type: "spring", stiffness: 300 }}
                    >
                      <h3 className="font-semibold text-lg mb-2 text-gray-800">{programme.name}</h3>
                      <div className="flex items-center text-gray-600 mb-1">
                        <Clock className="w-4 h-4 mr-2" />
                        <span>{programme.duration}</span>
                      </div>
                      <div className="flex items-center text-gray-600">
                        <Users className="w-4 h-4 mr-2" />
                        <span>Intake: {programme.intake} students</span>
                      </div>
                      <button className="mt-4 text-primary hover:text-primary-dark transition-colors duration-300 flex items-center">
                        <BookOpen className="w-4 h-4 mr-1" />
                        Learn more
                      </button>
                    </motion.div>
                  ))}
                </div>
              </motion.div>
            )}
          </AnimatePresence>
        </motion.div>
      ))}
    </div>
  )
}

export default ProgrammesList

