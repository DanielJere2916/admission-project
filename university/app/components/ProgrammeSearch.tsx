"use client"

import { useState } from "react"
import { motion } from "framer-motion"
import { Search, Filter } from "lucide-react"

const ProgrammeSearch = () => {
  const [isExpanded, setIsExpanded] = useState(false)

  return (
    <motion.div
      className="fixed bottom-8 left-1/2 transform -translate-x-1/2 bg-white rounded-full shadow-lg z-10"
      initial={{ y: 100, opacity: 0 }}
      animate={{ y: 0, opacity: 1 }}
      transition={{ delay: 0.5, duration: 0.5 }}
    >
      <div className="flex items-center">
        <motion.div className="flex items-center" animate={{ width: isExpanded ? "auto" : "40px" }}>
          <button className="p-2 rounded-full bg-primary text-white" onClick={() => setIsExpanded(!isExpanded)}>
            <Search className="w-6 h-6" />
          </button>
          {isExpanded && (
            <motion.input
              type="text"
              placeholder="Search programmes..."
              className="ml-2 p-2 outline-none"
              initial={{ width: 0, opacity: 0 }}
              animate={{ width: "200px", opacity: 1 }}
              transition={{ duration: 0.3 }}
            />
          )}
        </motion.div>
        {isExpanded && (
          <motion.button
            className="ml-2 p-2 rounded-full bg-gray-200 text-gray-600"
            initial={{ scale: 0, opacity: 0 }}
            animate={{ scale: 1, opacity: 1 }}
            transition={{ delay: 0.1, duration: 0.3 }}
          >
            <Filter className="w-6 h-6" />
          </motion.button>
        )}
      </div>
    </motion.div>
  )
}

export default ProgrammeSearch

